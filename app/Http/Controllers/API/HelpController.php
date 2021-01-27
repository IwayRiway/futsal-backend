<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Help;

class HelpController extends Controller
{
    public function help()
    {
        $data['code'] = 200;
        $data['status'] = 'Berhasil';
        $data['result'] = Help::all();

        return $data;
    }
}
