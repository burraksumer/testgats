<?php

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('allows authenticated users to add comments', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create();

    $response = $this->actingAs($user)->post(route('comments.store', $post), [
        'content' => 'This is a test comment',
    ]);

    $response->assertRedirect(route('posts.show', $post->slug));
    $response->assertSessionHas('success');
    $this->assertDatabaseHas('comments', [
        'content' => 'This is a test comment',
        'user_id' => $user->id,
        'post_id' => $post->id,
    ]);
});

it('prevents unauthenticated users from adding comments', function () {
    $post = Post::factory()->create();

    $response = $this->post(route('comments.store', $post), [
        'content' => 'This is a test comment',
    ]);

    $response->assertRedirect(route('login'));
    $this->assertDatabaseMissing('comments', [
        'content' => 'This is a test comment',
        'post_id' => $post->id,
    ]);
});

it('allows admin users to delete comments', function () {
    $admin = User::factory()->create(['isAdmin' => true]);
    $comment = Comment::factory()->create();

    $response = $this->actingAs($admin)->delete(route('comments.destroy', $comment));

    $response->assertRedirect();
    $response->assertSessionHas('success');
    $this->assertDatabaseMissing('comments', ['id' => $comment->id]);
});

it('prevents non-admin users from deleting comments', function () {
    $user = User::factory()->create();
    $comment = Comment::factory()->create();

    $response = $this->actingAs($user)->delete(route('comments.destroy', $comment));

    $response->assertRedirect();
    $response->assertSessionHas('error');
    $this->assertDatabaseHas('comments', ['id' => $comment->id]);
});