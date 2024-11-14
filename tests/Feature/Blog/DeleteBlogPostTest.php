<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('allows authenticated admin users to delete posts', function () {
    $user = User::factory()->create();
    $user->setAdminStatus(true);
    $post = Post::factory()->create(['user_id' => $user->id]);

    $response = $this->actingAs($user)->delete(route('posts.destroy', $post));

    $response->assertRedirect(route('posts.index'));
    $response->assertSessionHas('success', 'Post deleted successfully.');
    $this->assertSoftDeleted($post);
});

it('will not allow non-authenticated users to delete posts', function () {
    $user = User::factory()->create();
    $user->setAdminStatus(true);
    $post = Post::factory()->create(['user_id' => $user->id]);
    $user->setAdminStatus(false);

    $response = $this->actingAs($user)->delete(route('posts.destroy', $post));

    $response->assertRedirect(route('home'));
    $response->assertSessionHas('error');
});

it('allows authenticated admin users to permanently delete trashed posts', function () {
    $user = User::factory()->create();
    $user->setAdminStatus(true);
    $trashedPost = Post::factory()->create(['deleted_at' => now()]);

    $response = $this->actingAs($user)->delete(route('posts.forceDelete', $trashedPost->id));

    $response->assertRedirect(route('posts.trash'));
    $response->assertSessionHas('success', 'Post permanently deleted successfully.');
    $this->assertDatabaseMissing('posts', ['id' => $trashedPost->id]);
});

it('will not allow non-admin users to permanently delete trashed posts', function () {
    $user = User::factory()->create();
    $user->setAdminStatus(true);
    $trashedPost = Post::factory()->create(['deleted_at' => now()]);
    $user->setAdminStatus(false);

    $response = $this->actingAs($user)->delete(route('posts.forceDelete', $trashedPost->id));

    $response->assertRedirect(route('home'));
    $response->assertSessionHas('error');
});
