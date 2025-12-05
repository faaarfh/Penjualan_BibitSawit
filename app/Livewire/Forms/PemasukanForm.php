<?php

namespace App\Livewire\Forms;

use App\Models\Pemasukan;
use Illuminate\Validation\Rule;
use Livewire\Form;

class PemasukanForm extends Form
{
    public ?Pemasukan $pemasukan = null;

    public float $nominal = 0.0;

    protected function rules(): array
    {
        return [
            'nominal' => 'required',
        ];
    }

    protected function messages(): array
    {
        return [
            'nominal.required' => 'Nominal wajib diisi.',
        ];
    }

    public function store()
    {
        $pemasukan = Pemasukan::query()->create($this->validate());
        $this->reset();
    }

    public function update()
    {
        $this->pemasukan->update($this->validate());

        $this->reset();
    }

    public function delete()
    {
        $this->pemasukan->delete();
        $this->reset();
    }

    public function fill($id) {

        $this->pemasukan = Pemasukan::query()->find($id);
                $this->kas_pembayaran_id = $this->pemasukan->kas_pembayaran_id;
        $this->nominal = $this->pemasukan->nominal;

    }
}
