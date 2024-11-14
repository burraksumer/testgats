<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment = Comment::create([
            'content' => $request->input('content'),
            'user_id' => auth()->id(),
            'post_id' => $post->id,
        ]);

        $post->comments()->save($comment);

        return redirect()->route('posts.show', $post->slug)->with('success', 'Comment added successfully.');
    }

    public function destroy(Comment $comment)
    {
        if (Auth::user()->isAdmin) {
            $comment->delete();
            return redirect()->back()->with('success', 'Comment deleted successfully.');
        }

        return redirect()->back()->with('error', 'You are not authorized to delete this comment.');
    }
}