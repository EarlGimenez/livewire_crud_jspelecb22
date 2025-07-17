<?php

namespace App\Livewire\Users;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $name = '';
    public $password = '';

    public function login()
    {
        $this->validate([
            'name' => 'required|string|max:255|exists:users,name',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt(['name' => $this->name, 'password' => $this->password])) {
            session()->flash('success', 'Login successful.');
            $this->redirect(route('livewire.index'), navigate: true);
        } else {
            $this->addError('name', 'Invalid credentials.');
        }
    }
    public function render()
    {
        return view('livewire.users.login');
    }
}
