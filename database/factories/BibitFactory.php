<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bibit>
 */
class BibitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_bibit' => fake()->word(),
            'deskripsi' => fake()->sentence(10),
            'stok' => fake()->numberBetween(10, 200),
            'harga' => fake()->numberBetween(20000, 100000),
            'gambar' => 'https://www.shutterstock.com/image-photo/capsicum-annum-small-chili-plant-260nw-2428328845.jpg'
        ];
    }
}
