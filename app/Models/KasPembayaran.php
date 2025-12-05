<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class KasPembayaran extends Model
{
    use HasFactory;

    protected $table = 'kas_pembayaran';
    protected $guarded = [];


    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function kasMingguan()
    {
        return $this->belongsTo(KasMingguan::class, 'kas_mingguan_id');
    }


    public function pemasukan()
    {
        return $this->hasOne(Pemasukan::class, 'kas_pembayaran_id');
    }

    public static function jumlahPemasukanLabel($kelas_id)
    {
        $jumlah = self::countSudahBayarBulanIni($kelas_id) * 1000;
        return "Rp " . number_format($jumlah, 0, ',', '.');
    }


    public static function countSudahBayarBulanIni($kelas_id)
    {
        return self::where('terbayar', true)
            ->where('kelas_id', $kelas_id)
            ->whereHas('kasMingguan', function ($query) {
                $query->where('bulan', now()->month)
                      ->where('tahun', now()->year);
            })
            ->count();
    }

}
