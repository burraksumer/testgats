@extends('layouts.app')

@section('content')
    <div class="mx-auto ">
        <div class="flex">
            <h1 class="m-auto text-xl font-semibold tracking-tight text-left scroll-m-20">Blog Posts</h1>

        </div>
        @if (Auth::check() && Auth::user()->isAdmin)
            <div class="m-auto mt-3">
                <div class="grid grid-flow-col gap-2">
                    <x-link-button
                        href='posts.create'
                        variant='dark'
                        iconName='pen'
                    >
                        Create Post
                    </x-link-button>

                    <x-link-button
                        href='posts.trash'
                        variant='dark'
                        iconName='trash'
                    >
                        Trashed posts
                    </x-link-button>
                </div>
            </div>
        @endif

        <div class="mb-20">
            @foreach ($posts as $post)
                <x-v-card
                    title="{{ $post->title }}"
                    date="{{ $post->created_at->toFormattedDateString() }}"
                    content="{{ $post->summary }}"
                >
                    <x-link-button
                        href="{{ route('posts.show', ['post' => $post->slug]) }}"
                        variant='dark'
                        iconNameEnd='arrow-right'
                    >Read more</x-link-button>
                </x-v-card>
            @endforeach
            {{ $posts->links() }}
        </div>
    </div>
@endsection
