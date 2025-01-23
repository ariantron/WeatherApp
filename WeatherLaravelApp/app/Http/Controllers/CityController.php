<?php

namespace App\Http\Controllers;

use App\Models\City;

class CityController extends Controller
{
    public function index()
    {
        return $this->success(
            data: City::all()->toArray()
        );
    }
}
