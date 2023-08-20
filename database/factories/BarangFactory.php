<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_barang' => fake('id_ID')->word(),
            'harga'       => fake()->randomDigitNotZero() . fake()->randomElement([fake()->numerify('000'), fake()->numerify('000000')]),
            'stok'        => fake()->numberBetween(0, 100),
        ];
    }
}