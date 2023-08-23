<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Auth;
use App\Models\Barang;
use App\Models\Cabang;
use App\Models\Detail_transaksi;
use App\Models\Jadwal;
use App\Models\Kasir;
use App\Models\Pembayaran;
use App\Models\Perusahaan;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //* Method 1 Unfinished, do seeder with factories one by one 
        // Kasir::factory()->count(10)->create();

        //*Method 2 Nested seeding though difficult
        Perusahaan::factory()->count(5)->create()->each(
            function (Perusahaan $perusahaan) {
                Cabang::factory()
                    ->count(1)
                    ->create(['id_perusahaan' => $perusahaan->id_perusahaan])
                    ->each(
                        function (Cabang $cabang) {
                            Kasir::factory()
                                ->count(1)
                                ->for(Auth::factory(), 'akun')
                                ->hasJadwal(1, function ($attr, Kasir $kasir) {
                                    return ['id_kasir' => $kasir->id_kasir];
                                }) //? hasJadwal is "magic" way to seed children table
                                ->create(['id_cabang' => $cabang->id_cabang]);
                            Barang::factory()
                                ->count(10)
                                ->create(['id_cabang' => $cabang->id_cabang])//Below is optional
                                ->each(function (Barang $barang) {
                                    Detail_transaksi::factory()
                                        ->count(1)
                                        ->for(Transaksi::factory()->state(['id_kasir' => 1]),'transaksi')
                                        ->create(['id_barang' => $barang->id_barang]);
                                });
                        }
                    );
            }
        );
    }
}