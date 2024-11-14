@extends('layouts.app')

@section('content')
    <div class="mx-auto">
        <div class="flex flex-col gap-2">
            <h1 class="m-auto text-xl font-semibold tracking-tight text-left scroll-m-20"> Hey there,
                {{ $user->name }} 👋
            </h1>
            <h2 class="m-auto mb-10 text-lg font-semibold tracking-tight text-left scroll-m-20">Edit your profile to
                your
                liking!</h2>
        </div>

        <div class="flex flex-col items-center justify-center gap-3 mx-auto mb-20">
            <form
                class="flex flex-col w-full gap-3"
                action="{{ route('profile.update', $user) }}"
                method="POST"
                novalidate
            >
                @csrf
                @method('PUT')

                <x-text-input
                    name="name"
                    value="{{ old('name', $user->name) }}"
                    required
                    placeholder="Name"
                />
                <x-text-input
                    name="username"
                    value="{{ old('username', $user->username) }}"
                    required
                    placeholder="Username"
                />
                <x-text-input
                    name="email"
                    type="email"
                    value="{{ old('email', $user->email) }}"
                    required
                    placeholder="Email"
                />
                <x-text-input
                    name="current_password"
                    type="password"
                    required
                    placeholder="Current Password"
                />
                <x-text-input
                    name="password"
                    type="password"
                    placeholder="New Password"
                />
                <x-text-input
                    name="password_confirmation"
                    type="password"
                    placeholder="Confirm New Password"
                />

                <div class="flex justify-end gap-3 mt-6">
                    <x-link-button
                        className="w-full"
                        href="{{ route('profile.show', $user) }}"
                        variant="white"
                        iconName="arrow-left"
                    >Cancel</x-link-button>
                    <x-v-button
                        type="submit"
                        variant="dark"
                    ><x-v-icon name='save'></x-v-icon> Update Profile</x-v-button>
                </div>
            </form>
            <form
                class="w-full"
                action="{{ route('profile.destroy', $user) }}"
                method="POST"
                onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');"
            >
                @csrf
                @method('DELETE')
                <x-v-button
                    type="submit"
                    variant="dark"
                ><x-v-icon name='trash'></x-v-icon> Delete Account</x-v-button>
            </form>
        </div>
    </div>
@endsection
