<?php

namespace App\Livewire\Forms;

use App\Enums\StatusPesanan;
use App\Models\Pesanan;
use Livewire\Form;

class PesananForm extends Form
{
    public ?Pesanan $pesanan = null;

    public ?int $user_id;

    public ?int $total_harga;

    public ?StatusPesanan $status;

    public ?string $tanggal_pesan;

    public ?string $tanggal_bayar;

    public $metode_pembayaran; // Tambahkan properti metode pembayaran

    protected function rules(): array
    {
        return [
            'user_id' => 'required',
            'total_harga' => 'required',
            'status' => 'required',
            'tanggal_pesan' => 'required',
            'tanggal_bayar' => 'required',
            'metode_pembayaran' => 'required', // Tambahkan validasi metode pembayaran
        ];
    }

    protected function messages(): array
    {
        return [
            'user_id.required' => 'User Id wajib diisi.',
            'total_harga.required' => 'Total Harga wajib diisi.',
            'status.required' => 'Status wajib diisi.',
            'tanggal_pesan.required' => 'Tanggal Pesan wajib diisi.',
            'tanggal_bayar.required' => 'Tanggal Bayar wajib diisi.',
            'metode_pembayaran.required' => 'Metode Pembayaran wajib diisi.', // Pesan validasi metode pembayaran
        ];
    }

    public function store()
    {
        $pesanan = Pesanan::query()->create($this->validate());
        $this->reset();
    }

    public function update()
    {
        $this->pesanan->update($this->validate());

        $this->reset();
    }

    public function delete()
    {
        $this->pesanan->delete();
        $this->reset();
    }

    public function fill($id)
    {
        $this->pesanan = Pesanan::query()->find($id);
        $this->pesanan->load('detail');
        $this->pesanan->load('detail.bibit');
        $this->pesanan->load('user');
        $this->user_id = $this->pesanan->user_id;
        $this->total_harga = $this->pesanan->total_harga;
        $this->status = $this->pesanan->status;
        $this->tanggal_pesan = $this->pesanan->tanggal_pesan;
        $this->tanggal_bayar = $this->pesanan->tanggal_bayar;
        $this->metode_pembayaran = $this->pesanan->metode_pembayaran ?? null; // Isi metode pembayaran jika ada
    }
}
