<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pembayaran>
 */
class PembayaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'harga_total'     => fake()->randomDigitNotZero() . fake()->randomElement([fake()->numerify('000'), fake()->numerify('000000')]),
            'uang_pembayaran' => fake()->randomDigitNotZero() . fake()->randomElement([fake()->numerify('000'), fake()->numerify('000000')]),
            'uang_kembali'    => fake()->randomDigitNotZero() . fake()->randomElement([fake()->numerify('000'), fake()->numerify('000000')])
        ];
    }
}