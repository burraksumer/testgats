<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('allows users to delete their own profile', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->delete('/profile/'.$user->id);
    $response->assertStatus(302);
    $response->assertRedirect('/');
    $this->assertDatabaseMissing('users', [
        'id' => $user->id,
    ]);
});

it('will not allow users to delete other users profiles', function () {
    $user = User::factory()->create();
    $otherUser = User::factory()->create();
    $response = $this->actingAs($user)->delete('/profile/'.$otherUser->id);
    $response->assertStatus(302);
    $response->assertRedirect('/');
    $this->assertDatabaseHas('users', [
        'id' => $otherUser->id,
    ]);
});

it('will not allow guests to delete users profiles', function () {
    $user = User::factory()->create();
    $response = $this->delete('/profile/'.$user->id);
    $response->assertStatus(302);
    $response->assertRedirect('/');
    $this->assertDatabaseHas('users', [
        'id' => $user->id,
    ]);
});
