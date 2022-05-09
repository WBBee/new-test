<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Case1Controller extends Controller
{

    public function test_case_1()
    {
        $saldoawal = 100000;
        $mutasi = array(
            (object)["tanggal" => "2021-10-01", "masuk" => 200000, "keluar" => 0, "saldo" => 0],
            (object)["tanggal" => "2021-10-03", "masuk" => 300000, "keluar" => 0, "saldo" => 0],
            (object)["tanggal" => "2021-10-05", "masuk" => 150000, "keluar" => 0, "saldo" => 0],
            (object)["tanggal" => "2021-10-02", "masuk" => 0, "keluar" => 100000, "saldo" => 0],
            (object)["tanggal" => "2021-10-04", "masuk" => 0, "keluar" => 150000, "saldo" => 0],
            (object)["tanggal" => "2021-10-06", "masuk" => 0, "keluar" => 50000, "saldo" => 0]
        );

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

        return response()->json([
            'akumulasi saldo' => $akumulasi_saldo,
        ]);
    }
}
