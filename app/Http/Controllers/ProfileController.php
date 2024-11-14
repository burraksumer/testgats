<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        if (! Auth::check() || ! Auth::user()->can('view', $user)) {
            return redirect()->route('home');
        }

        return view('profile.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        if (! Auth::check() || ! Auth::user()->can('update', $user)) {
            return redirect()->route('home');
        }

        return view('profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user = Auth::user();

        if (! $request->user() || $request->user()->cannot('update', $user)) {
            return back()->withErrors([
                'Error' => 'You are not authorized to edit this user.',
            ]);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:128|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'current_password' => 'required|string',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if (! Hash::check($validated['current_password'], $user->password)) {
            return back()->withErrors([
                'current_password' => 'The provided password does not match our records.',
            ]);
        }

        $user->name = $validated['name'];
        $user->username = $validated['username'];
        $user->email = $validated['email'];

        if ($validated['password']) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('profile.show', $user->id)->with('success', 'Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if (! $request->user()) {
            return redirect()->route('home');
        }

        $user = Auth::user();
        $this->authorize('delete', $user);
        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Account deleted successfully');
    }
}
