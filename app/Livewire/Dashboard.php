<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
class Dashboard extends Component
{
    public $user;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        $tahunIni = now()->year;
        $bulanIni = now()->month;

        $penjualanBulanan = \App\Models\Pesanan::whereMonth('tanggal_pesan', $bulanIni)
            ->whereYear('tanggal_pesan', $tahunIni)
            ->get();

        $totalTransaksiBulanan = $penjualanBulanan->count();
        $totalPendapatanBulanan = $penjualanBulanan->sum('total_harga');
        return view('livewire.dashboard', [ 

            'totalTransaksiBulanan' => $totalTransaksiBulanan,
            'totalPendapatanBulanan' => $totalPendapatanBulanan,
        ]);
    }
}
