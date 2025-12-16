<?php

namespace Database\Factories;

use App\Enums\MetodePembayaran;
use App\Enums\StatusPesanan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pesanan>
 */
class PesananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'total_harga' => fake()->numberBetween(100000, 2000000),
            'status' => StatusPesanan::MENUNGGU_KONFIRMASI,
            'tanggal_pesan' => now(),
            'tanggal_bayar' => null,
            'metode_pembayaran' => fake()->randomElement(MetodePembayaran::values()),
            'keterangan' => $this->faker->paragraph()
        ];
    }
}
