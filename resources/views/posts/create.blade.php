@extends('layouts.app')

@section('content')
    <div class="px-4 mx-auto ">
        <h1 class="mb-4 text-xl font-bold text-center">Create New Post</h1>

        <form
            action="{{ route('posts.store') }}"
            method="POST"
            novalidate
        >
            @csrf
            <div class="mb-4">
                <label
                    class="block mb-2 text-sm font-bold text-gray-700"
                    for="title"
                >Title:</label>
                <x-text-input
                    id="title"
                    name="title"
                    type="text"
                    value="{{ old('title') }}"
                    placeholder="Title"
                    required
                ></x-text-input>
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label
                    class="block mb-2 text-sm font-bold text-gray-700"
                    for="content"
                >Content:
                </label>
                <x-v-textarea
                    id="content"
                    name="content"
                    value="{{ old('content') }}"
                    placeholder='Write your post here...'
                    required
                ></x-v-textarea>
            </div>
            <div class="grid grid-flow-col gap-3">
                <x-link-button
                    href="{{ route('posts.index') }}"
                    variant='dark'
                    iconName='arrow-left'
                >Back to all posts</x-link-button>
                <x-v-button type="submit">Submit</x-v-button>

            </div>
        </form>
    </div>
@endsection
