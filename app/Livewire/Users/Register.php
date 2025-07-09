<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $name = '';
    public $password = '';

    public $password2 = '';

    public function register()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed:password2',
        ]);

        User::create([
            'name' => $this->name,
            'password' => bcrypt($this->password),
        ]);

        return redirect()->route('register')->with('success', 'Registration successful.');
    }

    public function render()
    {
        return view('livewire.users.register');
    }
}
