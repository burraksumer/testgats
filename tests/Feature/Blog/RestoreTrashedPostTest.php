<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('allows authanticated admin users to restore trashed posts', function () {
    $user = User::factory()->create();
    $user->setAdminStatus(true);
    $trashedPost = Post::factory()->create(['deleted_at' => now()]);

    $response = $this->actingAs($user)->post(route('posts.restore', $trashedPost->id));

    $response->assertRedirect(route('posts.trash'));
    $response->assertSessionHas('success', 'Post restored successfully.');
    $this->assertDatabaseHas('posts', [
        'id' => $trashedPost->id,
        'deleted_at' => null,
    ]);
});

it('will not allow non-admin users to restore trashed posts', function () {
    $user = User::factory()->create();
    $user->setAdminStatus(true);
    $trashedPost = Post::factory()->create(['deleted_at' => now()]);
    $user->setAdminStatus(false);

    $response = $this->actingAs($user)->post(route('posts.restore', $trashedPost->id));

    $response->assertRedirect(route('home'));
    $response->assertSessionHas('error');
});
