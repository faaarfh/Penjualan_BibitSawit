<?php

namespace Database\Factories;

use App\Models\Pesanan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengiriman>
 */
class PengirimanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pesanan_id' => Pesanan::factory(),
            'alamat_pengiriman' => fake()->address(),
            'status_pengiriman' => 'menunggu',
            'tanggal_kirim' => null,
            'tanggal_terima' => null,
        ];
    }
}
