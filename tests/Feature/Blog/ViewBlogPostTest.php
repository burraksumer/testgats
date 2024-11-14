<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('displays a list of posts', function () {
    $posts = Post::factory()->count(3)->create();

    $response = $this->get(route('posts.index'));

    $response->assertStatus(200);
    $posts->each(fn ($post) => $response->assertSee($post->title));
});

it('gets the posts as paginated', function () {
    $posts = Post::factory()->count(11)->create();
    $response = $this->get(route('posts.index'));
    $response->assertStatus(200);
    $response->assertSee('Next');
});

it('displays a single post', function () {
    $post = Post::factory()->create();

    $response = $this->get(route('posts.show', $post->slug));

    $response->assertStatus(200);
    $response->assertSee($post->title);
    $response->assertSee($post->content);
});

it('displays trashed posts for authanticated admin users', function () {
    $user = User::factory()->create();
    $user->setAdminStatus(true);
    $trashedPosts = Post::factory()->count(3)->create(['deleted_at' => now()]);

    $response = $this->actingAs($user)->get(route('posts.trash'));

    $response->assertStatus(200);
    $trashedPosts->each(fn ($post) => $response->assertSee($post->title));
});

it('will not display trashed posts for non-admin users', function () {
    $user = User::factory()->create();
    $user->setAdminStatus(true);
    $trashedPosts = Post::factory()->count(3)->create(['deleted_at' => now()]);
    $user->setAdminStatus(false);

    $response = $this->actingAs($user)->get(route('posts.trash'));

    $response->assertRedirect(route('home'));
    $response->assertSessionHas('error');
});

it('correctly handles and redirects malformed slugs', function () {
    $post = Post::factory()->create(['title' => 'Test Post']);
    $malformedSlug = 'incorrect-slug-'.$post->id;

    $response = $this->get(route('posts.show', $malformedSlug));

    $response->assertRedirect(route('posts.show', $post->slug));
});
