<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Laporan')]
class Laporan extends Component
{
    public function render()
    {

        // Hari ini
        $hariIni = now()->toDateString();

        $penjualanHariIni = \App\Models\Pesanan::with('detail.bibit')
            ->whereDate('tanggal_pesan', $hariIni)
            ->get();

        $totalTransaksiHariIni = $penjualanHariIni->count();
        $totalPendapatanHariIni = $penjualanHariIni->sum('total_harga');

        // Bulan ini
        $bulanIni = now()->month;
        $tahunIni = now()->year;

        $penjualanBulanan = \App\Models\Pesanan::whereMonth('tanggal_pesan', $bulanIni)
            ->whereYear('tanggal_pesan', $tahunIni)
            ->get();

        $totalTransaksiBulanan = $penjualanBulanan->count();
        $totalPendapatanBulanan = $penjualanBulanan->sum('total_harga');

        // Rata-rata per hari (simple)
        $jumlahHariLewat = now()->day;
        $rataRataHarian = $jumlahHariLewat > 0 ? round($totalTransaksiBulanan / $jumlahHariLewat, 2) : 0;

        // Grafik per jenis bibit
        $grafikBibit = \App\Models\PesananDetail::selectRaw('bibit.nama_bibit, SUM(jumlah) AS total')
            ->join('bibit', 'bibit.id', '=', 'pesanan_detail.bibit_id')
            ->groupBy('bibit.nama_bibit')
            ->orderBy('bibit.nama_bibit')
            ->get();

        return view('livewire.laporan', [
            'totalTransaksiHariIni' => $totalTransaksiHariIni,
            'totalPendapatanHariIni' => $totalPendapatanHariIni,

            'totalTransaksiBulanan' => $totalTransaksiBulanan,
            'totalPendapatanBulanan' => $totalPendapatanBulanan,
            'rataRataHarian' => $rataRataHarian,

            'grafikBibit' => $grafikBibit,
        ]);
    }
}
