<?php

namespace App\Livewire;

use App\Enums\StatusPesanan;
use App\Models\Bibit;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Traits\WithModal;
use App\Traits\WithNotify;
use Livewire\Attributes\Computed;
use Livewire\Component;

class KatalogBibit extends Component
{
    use WithModal;
    use WithNotify;

    public $search = '';

    public $orderBibit;

    public $qty = 1;

    public $orderTotal = 0;

    public Bibit $selectedBibit;

    public function beli($id)
    {
        $this->orderBibit = Bibit::find($id);

        if (! $this->orderBibit) {
            $this->notifyError('Bibit tidak ditemukan');

            return;
        }

        $this->qty = 1;
        $this->orderTotal = $this->orderBibit->harga * $this->qty;

        $this->openModal('modalBeliBibit');
    }

    public function masukkanKeranjang()
    {
        $user = auth()->user();

        // Cari pesanan aktif user
        $pesanan = Pesanan::query()->create(
            [
                'user_id' => $user->id,
                'status' => StatusPesanan::MENUNGGU_KONFIRMASI,
            ],
            [
                'total_harga' => 0,
            ]
        );

        // Tambah detail
        $detail = PesananDetail::create([
            'pesanan_id' => $pesanan->id,
            'bibit_id' => $this->orderBibit->id,
            'jumlah' => $this->qty,
            'harga_satuan' => $this->orderBibit->harga,
            'subtotal' => $this->orderTotal,
        ]);

        // Update total harga
        $pesanan->total_harga += $this->orderTotal;
        $pesanan->save();

        $this->closeModal('modalBeliBibit');
        $this->notifySuccess('Berhasil menambahkan ke keranjang!');
    }

    public function tambahQty()
    {
        if ($this->qty < $this->orderBibit->stok) {
            $this->qty++;
            $this->hitungTotal();
        }
    }

    public function kurangQty()
    {
        if ($this->qty > 1) {
            $this->qty--;
            $this->hitungTotal();
        }
    }

    public function hitungTotal()
    {
        $this->orderTotal = $this->orderBibit->harga * $this->qty;
    }

    public function showDetail($id)
    {
        $this->selectedBibit = Bibit::find($id);

        if (! $this->selectedBibit) {
            $this->notifyError('Bibit tidak ditemukan');

            return;
        }

        // membuka modal
        $this->openModal('modalDetailBibit');
    }

    #[Computed]
    public function bibitList()
    {
        return Bibit::query()->where('nama_bibit', 'like', "%{$this->search}%")->get();
    }

    public function render()
    {
        return view('livewire.katalog-bibit');
    }
}
