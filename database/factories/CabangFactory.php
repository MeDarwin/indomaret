<?php

namespace Database\Factories;

use App\Models\Perusahaan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cabang>
 */
class CabangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_perusahaan' => Perusahaan::factory(),
            'nama'          => 'indomar' . '-' . fake('id_ID')->city(),
            'kode_cabang'   => fake()->numberBetween(),
            'kontak_cabang' => fake('id_ID')->phoneNumber(),
            'alamat'        => fake('id_ID')->address()
        ];
    }
}