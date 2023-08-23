<?php

namespace Database\Factories;

use App\Models\Pembayaran;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_pembayaran' => Pembayaran::factory(),
            'kode_transaksi' => fake()->year() . '-' . fake()->month() . '-' . fake()->dayOfMonth() . '-' . fake()->numberBetween(1, 24),
        ];
    }
}