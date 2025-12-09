<?php

namespace App\Livewire;

use App\Enums\Role;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class Register extends Component
{
    public $name;

    public $email;

    public $password;

    public $alamat;

    public $no_hp;

    public function register()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'role' => Role::PEMBELI,
            'alamat' => $this->alamat,
            'no_hp' => $this->no_hp,
        ]);

        session()->flash('success', 'Registrasi berhasil. Silakan login.');

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
