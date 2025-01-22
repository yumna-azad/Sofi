<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use Illuminate\Validation\ValidationException; // Import ValidationException
use Laravel\Fortify\Actions\AttemptToAuthenticate;
use Laravel\Fortify\Actions\EnsureLoginIsNotThrottled;
use Laravel\Fortify\Actions\PrepareAuthenticatedSession;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;

#[Title('login')]
class LoginPage extends Component
{
    public $email;
    public $password;

    public function save()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();

            return auth()->user()->isAdmin() 
                ? redirect()->intended(route('admin.dashboard'))
                : redirect()->intended(route('dashboard'));
        }

        session()->flash('error', 'Invalid credentials');
        return;
    }

    public function render()
    {
        return view('livewire.auth.login-page');
    }
}
