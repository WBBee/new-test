<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Nette\Utils\Json;

class Case4Controller extends Controller
{
    public function test_case_4(Request $request)
    {
        $request->validate([
            'total_harga' => 'required|integer',
            'persen_pajak' => 'required|integer',
        ]);

        $net_sales = $request->total_harga + ($request->total_harga * $request->persen_pajak) / 100;

        return response()->json([
            'net_sales' => $net_sales,
            'pajak_rp' => $request->persen_pajak . '%',
        ]);
    }

    public function test_case_5(Request $request)
    {
        $request->validate([
            'total_harga' => 'required|integer',
            'total_diskon' => 'required|integer',
        ]);

        $discount =  ($request->total_harga * $request->total_diskon) / 100;

        return response()->json([
            'total_harga_setelah_didiskon' => $request->total_harga - $discount,
            'diskon' => $request->total_diskon . '%',
            'total_diskon' => $discount,
        ]);
    }

    public function test_case_6(Request $request)
    {
        $request->validate([
            'total_harga' => 'required|integer',
            'markup_persen' => 'required|integer',
            'share_persen' => 'required|integer',
        ]);

        $markup_persen =  ($request->total_harga * $request->markup_persen) / 100;
        $share_percent = ($request->total_harga * $request->share_persen) / 100;

        return response()->json([
            'net_untuk_resto' => $request->total_harga + $markup_persen,
            'share_untuk_ojol' => $share_percent,
            'total_yang_harus_dibayar' => $request->total_harga + $share_percent + $markup_persen,
        ]);
    }
}
