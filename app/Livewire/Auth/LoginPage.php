<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use Illuminate\Validation\ValidationException; // Import ValidationException

#[Title('login')]
class LoginPage extends Component
{
    public $email;
    public $password;

    public function save()
    {
        // Validation rules
        $this->validate([
            'email' => 'required|email|max:255|exists:users,email',
            'password' => 'required|min:6|max:255',
        ]);

        // Attempt to authenticate the user
        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            // Flash error message on failure
            session()->flash('error', 'Invalid credentials');
            return;
        }

        // Redirect on success
        return redirect()->intended();
    }

    public function render()
    {
        return view('livewire.auth.login-page');
    }
}
