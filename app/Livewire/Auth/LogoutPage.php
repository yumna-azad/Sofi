<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LogoutPage extends Component
{
    public function mount()
    {
        Auth::guard('web')->logout();
        session()->invalidate();
        session()->regenerateToken();
        
        return redirect('/');
    }

    public function render()
    {
        return view('livewire.auth.logout-page');
    }
} 