<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('allows authenticated admin users to create a post', function () {
    $user = User::factory()->create();
    $user->setAdminStatus(true);
    $postData = [
        'title' => 'New Post Title',
        'content' => 'This is the content of the new post.',
    ];

    $response = $this->actingAs($user)->post(route('posts.store'), $postData);

    $response->assertRedirect(route('posts.index'));
    $response->assertSessionHas('success', 'Post created successfully.');
    $this->assertDatabaseHas('posts', [
        'title' => $postData['title'],
        'user_id' => $user->id,
    ]);
});

it('returns create post view for authenticated admin users', function () {
    $user = User::factory()->create();
    $user->setAdminStatus(true);
    $response = $this->actingAs($user)->get(route('posts.create'));
    $response->assertStatus(200);
    $response->assertViewIs('posts.create');
});

it('will not allow non-authenticated users to create a post', function () {
    $user = User::factory()->create();
    $user->setAdminStatus(false);
    $postData = [
        'title' => 'New Post Title',
        'content' => 'This is the content of the new post.',
    ];

    $response = $this->actingAs($user)->post(route('posts.store'), $postData);

    $response->assertRedirect(route('home'));
    $response->assertSessionHas('error');
});

it('will not display non-existent posts', function () {
    $post = Post::factory()->create();
    $response = $this->get(route('posts.show', $post->slug.'1'));
    $response->assertStatus(404);
    $response->assertDontSee($post->title);
    $response->assertDontSee($post->content);
});

it('belongs to an author', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create(['user_id' => $user->id]);

    expect($post->author)->toBeInstanceOf(User::class);
    expect($post->author->id)->toBe($user->id);
});

it('has many posts', function () {
    $user = User::factory()->create();
    Post::factory()->count(3)->create(['user_id' => $user->id]);

    expect($user->posts)->toHaveCount(3);
    expect($user->posts->first())->toBeInstanceOf(Post::class);
});
