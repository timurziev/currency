<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $url = file_get_contents('http://phisix-api3.appspot.com/stocks.json');
        $data = collect(json_decode($url, true));

        return response()->json($data['stock']);
    }
}
