<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('allows authenticated admin users to update posts', function () {
    $user = User::factory()->create();
    $user->setAdminStatus(true);
    $post = Post::factory()->create(['user_id' => $user->id]);
    $updatedData = [
        'title' => 'Updated Post Title',
        'content' => 'This is the updated content of the post.',
    ];

    $response = $this->actingAs($user)->put(route('posts.update', $post), $updatedData);

    $response->assertRedirect(route('posts.index'));
    $response->assertSessionHas('success', 'Post updated successfully.');
    $this->assertDatabaseHas('posts', [
        'id' => $post->id,
        'title' => $updatedData['title'],
    ]);
});

it('will not allow non-authenticated users to update posts', function () {
    $user = User::factory()->create();
    $user->setAdminStatus(true);
    $post = Post::factory()->create(['user_id' => $user->id]);
    $updatedData = [
        'title' => 'Updated Post Title',
        'content' => 'This is the updated content of the post.',
    ];
    $user->setAdminStatus(false);

    $response = $this->actingAs($user)->put(route('posts.update', $post), $updatedData);

    $response->assertRedirect(route('home'));
    $response->assertSessionHas('error');

});

it('stores the previous URL in session when editing a post', function () {
    $user = User::factory()->create(['isAdmin' => true]);
    $post = Post::factory()->create();

    $this->actingAs($user)
        ->get(route('posts.edit', $post));

    $backUrlKey = 'backUrl.post.'.$post->id;

    expect(session()->has($backUrlKey))->toBeTrue();
});
