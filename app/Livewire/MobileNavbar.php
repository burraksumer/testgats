<?php

namespace App\Livewire;

use Livewire\Component;

class MobileNavbar extends Component
{
    public $menuOpen = false;

    public function toggleMenuOpen()
    {
        $this->menuOpen = ! $this->menuOpen;
    }

    public function handleMenuClose()
    {
        $this->menuOpen = false;
    }

    public function handleESCKeyDown($event)
    {
        if ($event['key'] === 'Escape') {
            $this->menuOpen = false;
        }
    }

    public function render()
    {
        return view('livewire.mobile-navbar');
    }
}
