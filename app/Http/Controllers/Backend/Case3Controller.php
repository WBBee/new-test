<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\UangKeluar;
use App\Models\UangMasuk;
use Illuminate\Http\Request;

class Case3Controller extends Controller
{
    public function test_case_3()
    {
        $saldoawal = 100000;
        /** buat data mutasi */
        $mutasi = [];
        foreach (UangMasuk::select('tanggal', 'nominal')->get() as $key => $value) {
            $mutasi[] = (object) [
                'tanggal' => $value->tanggal,
                'masuk' => $value->nominal,
                'keluar' => 0,
                'saldo' => 0,
            ];
        }
        foreach (UangKeluar::select('tanggal', 'nominal')->get() as $key => $value) {
            $mutasi[] = (object) [
                'tanggal' => $value->tanggal,
                'masuk' => 0,
                'keluar' => $value->nominal,
                'saldo' => 0,
            ];;
        }

        /** mengurutkan berdasarkan tanggal */
        asort($mutasi);
        foreach ($mutasi as $key => $value) {
            /** menghitung akumulasi saldo setiap index */
            $akumulasi_saldo[] = [
                'tanggal' => $value->tanggal,
                'masuk' => $value->masuk,
                'keluar' => $value->keluar,
                'saldo' => $saldoawal = $saldoawal + $value->masuk - $value->keluar,
            ];
        }
        /** end */

        return [
            'akumulasi saldo' => $akumulasi_saldo,
        ];
    }
}
