<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('allows users to edit their own profile', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->get('/profile/'.$user->id.'/edit');
    $response->assertStatus(200);
});

it('will not allow users to edit other users profiles', function () {
    $user = User::factory()->create();
    $otherUser = User::factory()->create();
    $response = $this->actingAs($user)->get('/profile/'.$otherUser->id.'/edit');
    $response->assertStatus(302);
    $response->assertRedirect('/');
});

it('will not allow guests to edit users profiles', function () {
    $user = User::factory()->create();
    $response = $this->get('/profile/'.$user->id.'/edit');
    $response->assertStatus(302);
    $response->assertRedirect('/');
});

it('allows users to update their own profile', function () {
    $user = User::factory()->create(
        [
            'name' => 'John Doe',
            'username' => 'johndoe',
            'email' => 'john@example.com',
            'password' => 'password123',
        ]
    );
    $response = $this->actingAs($user)->put('/profile/'.$user->id, [
        'name' => 'John Doe',
        'username' => 'johndoe1',
        'email' => 'john@example.com',
        'current_password' => 'password123',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ]);
    $response->assertStatus(302);
    $response->assertRedirect('/profile/'.$user->id);
    $this->assertDatabaseHas('users', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);
});

it('will not allow users to update other users profiles', function () {
    $user = User::factory()->create();
    $otherUser = User::factory()->create();
    $response = $this->actingAs($user)->put('/profile/'.$otherUser->id, [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'current_password' => 'password123',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ]);
    $response->assertStatus(302);
    $response->assertRedirect('/');
    $this->assertDatabaseMissing('users', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);
});

it('will not allow guests to update users profiles', function () {
    $user = User::factory()->create();
    $response = $this->put('/profile/'.$user->id, [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'current_password' => 'password123',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ]);

    $response->assertRedirect(route('home'));
    $this->assertDatabaseMissing('users', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);
});

it('will not allow users to update their profile without a current password', function () {
    $user = User::factory()->create(
        [
            'name' => 'Jane Doe',
            'username' => 'johndoe',
            'email' => 'jane@example.com',
            'password' => 'password123',
        ]
    );
    $response = $this->actingAs($user)->put('/profile/'.$user->id, [
        'name' => 'John Doe',
        'username' => 'johndoe1',
        'email' => 'john@example.com',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ]);
    $response->assertStatus(302);
    $response->assertSessionHasErrors('current_password');
    $this->assertDatabaseMissing('users', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);
});

it('will not allow users to update their profile with a wrong current password', function () {
    $user = User::factory()->create(
        [
            'name' => 'Jane Doe',
            'username' => 'johndoe',
            'email' => 'jane@example.com',
            'password' => 'password123',
        ]
    );
    $response = $this->actingAs($user)->put('/profile/'.$user->id, [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'username' => 'johndoe1',
        'current_password' => 'wrongpassword',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ]);
    $response->assertStatus(302);
    $response->assertSessionHasErrors('current_password');
    $this->assertDatabaseMissing('users', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);
});

it('will not allow users to update their profile with a new password that does not match the password confirmation', function () {
    $user = User::factory()->create(
        [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => 'password123',
        ]
    );
    $response = $this->actingAs($user)->put('/profile/'.$user->id, [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'current_password' => 'password123',
        'password' => 'password123',
        'password_confirmation' => 'password1234',
    ]);
    $response->assertStatus(302);
    $response->assertSessionHasErrors('password');
    $this->assertDatabaseMissing('users', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);
});

it('will not allow users to update their profile with a new password that is too short', function () {
    $user = User::factory()->create(
        [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => 'password123',
        ]
    );
    $response = $this->actingAs($user)->put('/profile/'.$user->id, [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'current_password' => 'password123',
        'password' => 'pass',
        'password_confirmation' => 'pass',
    ]);
    $response->assertStatus(302);
    $response->assertSessionHasErrors('password');
    $this->assertDatabaseMissing('users', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);
});

it('will not allow users to update their profile with a new password that is too long', function () {
    $user = User::factory()->create(
        [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => 'password123',
        ]
    );
    $response = $this->actingAs($user)->put('/profile/'.$user->id, [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'current_password' => 'password123',
        'password' => 'password123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123']);

    $response->assertStatus(302);
    $response->assertSessionHasErrors('password');
    $this->assertDatabaseMissing('users', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);
});
