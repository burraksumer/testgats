<?php

use App\Livewire\MobileNavbar;
use Livewire\Livewire;

it('toggles menu open state', function () {
    Livewire::test(MobileNavbar::class)
        ->assertSet('menuOpen', false)
        ->call('toggleMenuOpen')
        ->assertSet('menuOpen', true)
        ->call('toggleMenuOpen')
        ->assertSet('menuOpen', false);
});

it('handles menu close', function () {
    Livewire::test(MobileNavbar::class)
        ->set('menuOpen', true)
        ->call('handleMenuClose')
        ->assertSet('menuOpen', false);
});

it('handles ESC key press to close menu', function () {
    Livewire::test(MobileNavbar::class)
        ->set('menuOpen', true)
        ->call('handleESCKeyDown', ['key' => 'Escape'])
        ->assertSet('menuOpen', false);
});

it('does not close menu on non-ESC key press', function () {
    Livewire::test(MobileNavbar::class)
        ->set('menuOpen', true)
        ->call('handleESCKeyDown', ['key' => 'Enter'])
        ->assertSet('menuOpen', true);
});
