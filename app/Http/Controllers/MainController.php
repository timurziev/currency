<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $data = collect(json_decode(file_get_contents('http://phisix-api3.appspot.com/stocks.json'), true));

        return view('welcome', compact('data'));
    }
}
