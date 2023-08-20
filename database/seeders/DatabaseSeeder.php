<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Auth;
use App\Models\Cabang;
use App\Models\Kasir;
use App\Models\Perusahaan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //* Method 1
        // Kasir::factory()->count(10)->create();

        //*Method 2 More dynamic though difficult
        Perusahaan::factory()->count(5)->create()->each(
            function (Perusahaan $perusahaan) {
                Cabang::factory(1)
                    ->create(['id_perusahaan' => $perusahaan->id_perusahaan])
                    ->each(
                        function (Cabang $cabang) {
                            Kasir::factory()->for(Auth::factory(), 'akun')
                                ->create(['id_cabang' => $cabang->id_cabang]);
                        }
                    );
            }
        );
    }
}