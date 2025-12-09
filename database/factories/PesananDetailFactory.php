<?php

namespace Database\Factories;

use App\Models\Bibit;
use App\Models\Pesanan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PesananDetail>
 */
class PesananDetailFactory extends Factory
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
            'bibit_id' => Bibit::factory(),
            'jumlah' => fake()->numberBetween(1, 10),
            'harga_satuan' => fake()->numberBetween(20000, 100000),
            'subtotal' => fake()->numberBetween(30000, 200000),
        ];
    }
}
