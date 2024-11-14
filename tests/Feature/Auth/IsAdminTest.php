<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can set admin status', function () {
    $user = User::factory()->create(['isAdmin' => false]);

    $user->setAdminStatus(true);

    expect($user->fresh()->isAdmin)->toBeTrue();
});

it('can check admin status', function () {
    $adminUser = User::factory()->create(['isAdmin' => true]);
    $regularUser = User::factory()->create(['isAdmin' => false]);

    expect($adminUser->isAdmin())->toBeTrue();
    expect($regularUser->isAdmin())->toBeFalse();
});
