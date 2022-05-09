<?php

namespace Database\Seeders;

use App\Models\UangKeluar;
use App\Models\UangMasuk;
use Illuminate\Database\Seeder;

class SeedMutasi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arary_uang_masuk = [
            [
                'tanggal' => '2021-10-01',
                'nominal' => 200000,
            ], [
                'tanggal' => '2021-10-03',
                'nominal' => 300000,
            ], [
                'tanggal' => '2021-10-05',
                'nominal' => 150000,
            ],
        ];

        UangMasuk::insert($arary_uang_masuk);

        $arary_uang_keluar = [
            [
                'tanggal' => '2021-10-02',
                'nominal' => 100000,
            ], [
                'tanggal' => '2021-10-04',
                'nominal' => 150000,
            ], [
                'tanggal' => '2021-10-06',
                'nominal' => 50000,
            ],
        ];

        UangKeluar::insert($arary_uang_keluar);
    }
}
