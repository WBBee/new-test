<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Case2Controller extends Controller
{
    public function test_case_2()
    {
        $saldoAwalStok = 0;
        $saldoAwalStokRp = 0;
        $kartuStok = array(
            (object)[
                "tanggal" => "2021-10-01", "masuk" => 10, "keluar" => 0, "saldoQty" => 0, "masukRp" => 10000, "keluarRp" => 0, "saldoRp" => 0
            ],
            (object)[
                "tanggal" => "2021-10-03", "masuk" => 45, "keluar" => 0, "saldoQty" => 0, "masukRp" => 36000, "keluarRp" => 0, "saldoRp" => 0
            ],
            (object)[
                "tanggal" => "2021-10-05", "masuk" => 40, "keluar" => 0, "saldoQty" => 0, "masukRp" => 35000, "keluarRp" => 0, "saldoRp" => 0
            ],
            (object)[
                "tanggal" => "2021-10-02", "masuk" => 0, "keluar" => 5, "saldoQty" => 0, "masukRp" => 0, "keluarRp" => 0, "saldoRp" => 0
            ],
            (object)[
                "tanggal" => "2021-10-04", "masuk" => 0, "keluar" => 40, "saldoQty" => 0, "masukRp" => 0, "keluarRp" => 0, "saldoRp" => 0
            ],
            (object)[
                "tanggal" => "2021-10-06", "masuk" => 0, "keluar" => 35, "saldoQty" => 0, "masukRp" => 0, "keluarRp" => 0, "saldoRp" => 0
            ]
        );

        /** mengurutkan berdasarkan tanggal */
        asort($kartuStok);
        $data = [];
        foreach ($kartuStok as $key => $value) {
            /** menghitung akumulasi keluar rp */
            if ($saldoAwalStokRp > 0) { // lewati jika saldoRp sebelumnya 0
                $keluarRp = ($saldoAwalStokRp / $saldoQty) * $value->keluar;
            } else {
                $keluarRp = 0;
            }
            /** menghitung saldo Qty */
            $saldoQty = $saldoAwalStok = $saldoAwalStok + $value->masuk - $value->keluar;
            /** menghitung saldo Rp */
            $saldoRp = $saldoAwalStokRp = $saldoAwalStokRp + $value->masukRp - $keluarRp;

            $data[] = (object)[
                'tanggal' => $value->tanggal,
                'masuk' => $value->masuk,
                'keluar' => $value->keluar,
                'saldoQty' => $saldoQty,
                'masukRp' => $value->masukRp,
                'keluarRp' => $keluarRp,
                'saldoRp' => $saldoRp,
            ];
        }
        /** end */

        return response()->json([
            'hasil akumulasi' => $data,
        ]);
    }
}
