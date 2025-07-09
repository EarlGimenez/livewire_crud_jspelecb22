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
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt(['name' => $this->name, 'password' => $this->password])) {
            session()->flash('success', 'Login successful.');
            return redirect()->route('livewire.index');
        } else {
            return back()->withErrors(['name' => 'Invalid credentials.']);
        }
    }
    public function render()
    {
        return view('livewire.users.login');
    }
}
