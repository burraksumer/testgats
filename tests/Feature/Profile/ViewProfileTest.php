<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('allows users to see their own profile', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->get('/profile/'.$user->id);
    $response->assertSee($user->name);
    $response->assertStatus(200);
});

it('will not allow users to see other users profiles', function () {
    $user = User::factory()->create();
    $otherUser = User::factory()->create();
    $response = $this->actingAs($user)->get('/profile/'.$otherUser->id);
    $response->assertStatus(302);
    $response->assertRedirect('/');
});

it('will not allow guests to see users profiles', function () {
    $user = User::factory()->create();
    $response = $this->get('/profile/'.$user->id);
    $response->assertStatus(302);
    $response->assertRedirect('/');
});
