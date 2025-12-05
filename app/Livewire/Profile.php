<?php

namespace App\Livewire;

use App\Livewire\Forms\ProfileForm;
use App\Models\User;
use App\Traits\WithNotify;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Profile')]
class Profile extends Component
{
    use WithFileUploads;
    use WithNotify;

    public ProfileForm $form;

    public function mount()
    {

        $user = User::find(auth()->user()->id);

        $this->form->user = $user;
        $this->form->name = $user->name;
        $this->form->email = $user->email;

    }

    public function edit()
    {
        if ($this->form->update()) {

            $this->notifySuccess('Berhasil menyimpan perubahan profile');
        }

    }

    public function render()
    {
        return view('livewire.profile');
    }
}
