@extends('layouts.app')

@section('content')
    <div class="mx-auto ">
        <div class="flex flex-row">
            <h1 class="m-auto text-xl font-semibold tracking-tight text-left scroll-m-20">Trashed posts</h1>

        </div>
        <div class="m-auto mt-3">
            <div class="grid grid-flow-col gap-2">
                <x-link-button
                    href='posts.index'
                    variant='dark'
                    iconName='arrow-left'
                >
                    Back to all posts
                </x-link-button>
            </div>
        </div>

        <div class="mb-20">
            @forelse ($trashedPosts as $post)
                <x-v-card
                    title="{{ $post->title }}"
                    date="{{ $post->deleted_at->toFormattedDateString() }}"
                    content="{{ $post->content }}"
                >
                    <div class="grid grid-cols-2 gap-3">
                        <form
                            action="{{ route('posts.restore', $post->id) }}"
                            method="POST"
                        >
                            @csrf
                            <x-v-button
                                type="submit"
                                variant="dark"
                                iconName='restore'
                            >Restore</x-v-button>
                        </form>
                        <form
                            action="{{ route('posts.forceDelete', $post->id) }}"
                            method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this post permanently?');"
                        >
                            @csrf
                            @method('DELETE')
                            <x-v-button
                                type="submit"
                                variant="dark"
                                iconName='trash'
                            >Delete permanantly</x-v-button>
                        </form>
                    </div>
                </x-v-card>
            @empty
                <div class="mt-20">
                    No trashed posts found.
                </div>
            @endforelse
        </div>
    </div>
@endsection
