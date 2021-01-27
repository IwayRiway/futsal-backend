<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    public function food()
    {
        $data['code'] = 200;
        $data['status'] = 'Berhasil';
        $data['result'] = Food::all();

        return $data;
    }
}
