<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;

    protected $table = 'pesanan_detail';

    protected $fillable = ['pesanan_id', 'bibit_id', 'jumlah', 'harga_satuan', 'subtotal'];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

    public function bibit()
    {
        return $this->belongsTo(Bibit::class);
    }
}
