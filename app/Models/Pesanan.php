<?php

namespace App\Models;

use App\Enums\MetodePembayaran;
use App\Enums\StatusPesanan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $guarded = [];

    public function casts(): array
    {
        return [
            'metode_pembayaran' => MetodePembayaran::class,
            'status' => StatusPesanan::class,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detail()
    {
        return $this->hasOne(PesananDetail::class);
    }

    public function pengiriman()
    {
        return $this->hasOne(Pengiriman::class);
    }

    /**
     * Get the formatted price label.
     *
     * @return string
     */
    public function getLabelTotalHargaAttribute()
    {
        // Assuming $this->harga is the price property
        return 'Rp. '.number_format($this->total_harga, 0, ',', '.');
    }
}
