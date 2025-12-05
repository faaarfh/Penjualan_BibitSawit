<?php

namespace App\Livewire\Forms;

use App\Models\Gejala;
use Illuminate\Validation\Rule;
use Livewire\Form;

class GejalaForm extends Form
{
    public ?Gejala $gejala = null;

    public string $kode = '';

    public string $nama = '';

    protected function rules(): array
    {
        return [
            'kode' => [
                'required',
                Rule::unique('gejala', 'kode')->ignore($this->gejala),
            ],
            'nama' => 'required',
        ];
    }

    protected function messages(): array
    {
        return [
            'kode.unique' => 'Kode gejala telah digunakan',
            'kode.required' => 'Kode gejala belum ada',
            'nama.required' => 'Nama gejala belum ada',
        ];
    }

    public function store()
    {
        Gejala::create($this->validate());
        $this->reset();

    }

    public function update()
    {
        $this->gejala->update($this->validate());
        $this->reset();
    }

    public function delete()
    {
        $this->gejala->delete();
        $this->reset();
    }
}
