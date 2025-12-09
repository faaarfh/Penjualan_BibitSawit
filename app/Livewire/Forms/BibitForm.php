<?php

namespace App\Livewire\Forms;

use App\Models\Bibit;
use Livewire\Form;

class BibitForm extends Form
{
    public ?Bibit $bibit = null;

    public string $nama_bibit = '';

    public string $deskripsi = '';

    public string $stok = '';

    public int $harga = 0;

    protected function rules(): array
    {
        return [
            'nama_bibit' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
            'harga' => 'required',
        ];
    }

    protected function messages(): array
    {
        return [
            'nama_bibit.required' => 'Nama Bibit wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'stok.required' => 'Stok wajib diisi.',
            'harga.required' => 'Harga wajib diisi.',
        ];
    }

    public function store()
    {
        $bibit = Bibit::query()->create($this->validate());
        $this->reset();
    }

    public function update()
    {
        $this->bibit->update($this->validate());

        $this->reset();
    }

    public function delete()
    {
        $this->bibit->delete();
        $this->reset();
    }

    public function fill($id)
    {

        $this->bibit = Bibit::query()->find($id);
        $this->nama_bibit = $this->bibit->nama_bibit;
        $this->deskripsi = $this->bibit->deskripsi;
        $this->stok = $this->bibit->stok;
        $this->harga = $this->bibit->harga;

    }
}
