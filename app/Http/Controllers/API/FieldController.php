<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Field;

class FieldController extends Controller
{
    public function field()
    {
        $data['code'] = 200;
        $data['status'] = 'Berhasil';
        $data['result'] = Field::all();

        return $data;
    }
}
