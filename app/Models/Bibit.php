<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bibit extends Model
{
    use HasFactory;

    protected $table = 'bibit';

    protected $fillable = ['nama_bibit', 'deskripsi', 'stok', 'harga'];

    public function pesananDetail()
    {
        return $this->hasMany(PesananDetail::class);
    }

    public function getLabelHargaAttribute()
    {
        return 'Rp '.number_format($this->harga, 0, ',', '.');
    }
}
