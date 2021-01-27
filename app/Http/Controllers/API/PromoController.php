<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promo;

class PromoController extends Controller
{
    public function promo()
    {
        $data['code'] = 200;
        $data['status'] = 'Berhasil';
        $data['result'] = Promo::where('active', 1)->get();

        return $data;
    }

    public function detail(Request $request)
    {
        $data['code'] = 200;
        $data['status'] = 'Berhasil Promo';
        $data['result'] = Promo::findOrFail($request->id);

        return $data;
    }
}
