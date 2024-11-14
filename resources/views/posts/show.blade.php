@extends('layouts.app')

@section('content')
    <div class="mx-auto">
        <div class="flex flex-col mb-20 text-center">
            <div class="flex justify-center min-w-full mb-10">
                <x-link-button
                    href="{{ route('posts.index') }}"
                    variant='dark'
                    iconName='arrow-left'
                >Back to all posts</x-link-button>
            </div>
            <div class="mx-auto">
                <h1 class="mt-0 mb-1 text-2xl font-semibold leading-none tracking-tight text-neutral-900">{{ $post->title }}
                </h1>
                <small>{{ $post->created_at->toFormattedDateString() }}</small>
            </div>
            <div class="mb-0 text-left">{!! $post->content !!}</div>
        </div>
        <div class="grid grid-flow-col gap-3 mb-20">

            @if (Auth::check() && Auth::user()->isAdmin)
                <x-link-button
                    href="{{ route('posts.edit', $post) }}"
                    variant='dark'
                    iconName='pen'
                >Edit this post</x-link-button>
            @endif

            @if (Auth::check() && Auth::user()->isAdmin)
                <form
                    class="inline-block"
                    action="{{ route('posts.destroy', $post) }}"
                    method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this post?');"
                >
                    @csrf
                    @method('DELETE')
                    <x-v-button type="submit"> <x-v-icon name='trash'></x-v-icon> Delete</x-v-button>
                </form>
            @endif
        </div>

        <!-- Comments -->
        <div class="mt-8">
            <h2 class="mb-4 text-xl font-semibold">Comments</h2>
            @foreach ($post->comments as $comment)
                <x-v-card
                    title="Comment by {{ $comment->user->name }}"
                    content="{{ $comment->content }}"
                    date="{{ $comment->created_at->format('M d, Y H:i') }}"
                >
                    @if (Auth::check() && Auth::user()->isAdmin)
                        <form
                            class="mt-2"
                            action="{{ route('comments.destroy', $comment) }}"
                            method="POST"
                        >
                            @csrf
                            @method('DELETE')
                            <x-v-button
                                type="submit"
                                variant="dark"
                            >Delete Comment</x-v-button>
                        </form>
                    @endif
                </x-v-card>
            @endforeach
            @auth
                <form
                    class="mt-10"
                    action="{{ route('comments.store', $post) }}"
                    method="POST"
                >
                    @csrf
                    <div class="mb-4">
                        <label
                            class="block text-lg font-medium text-gray-700"
                            for="content"
                        >Add a comment</label>
                        <x-v-textarea
                            id="content"
                            name="content"
                            placeholder="I think this is a great post!"
                            required
                        ></x-v-textarea>
                    </div>
                    <x-v-button
                        type="submit"
                        variant="dark"
                    >Post Comment</x-v-button>
                </form>
            @else
                <p class="mt-4">Please <a
                        class="text-blue-600 hover:underline"
                        href="{{ route('login') }}"
                    >log in</a> to post a comment.</p>
            @endauth
        </div>

    </div>
@endsection
