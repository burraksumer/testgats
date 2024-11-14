@extends('layouts.app')

@section('content')
    <div class="mx-auto ">
        <div class="flex flex-col gap-2">
            <h1 class="m-auto text-xl font-semibold tracking-tight text-left scroll-m-20"> Hey there,
                {{ $user->name }} 👋
            </h1>
            <h2 class="m-auto mb-10 text-lg font-semibold tracking-tight text-left scroll-m-20">This is your profile card!
            </h2>
        </div>
    </div>

    <div class="flex items-center justify-center mx-auto mb-20">
        <x-profile-card
            name='{{ $user->name }}'
            username='{{ $user->username }}'
            email='{{ $user->email }}'
            avatar='{{ strtoupper(substr($user->name, 0, 1)) }}'
        >
            <x-link-button
                className='w-full'
                href="{{ route('profile.edit', Auth::user()) }}"
                variant='dark'
            >Edit profile</x-link-button>
        </x-profile-card>
    </div>
    </div>
@endsection
