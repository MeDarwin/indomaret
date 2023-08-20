<?php

namespace Database\Factories;

use App\Models\Auth;
use App\Models\Cabang;
use App\Models\Kasir;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kasir>
 */
class KasirFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'id_cabang'     => Cabang::factory(),
            // 'id_akun'       => Auth::factory(),
            'nama_lengkap'  => fake('id_ID')->name(),
            'tanggal_lahir' => fake()->date(),
            'jenis_kelamin' => fake()->randomElement([Kasir::GENDER_FEMALE, Kasir::GENDER_MALE]),
            'alamat'        => fake('id_ID')->address(),
            'kode_kasir'    => fake('id_ID')->nik()
        ];
    }
}