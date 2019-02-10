<?php

namespace App\Http\Controllers;

use App\Weather;

class WeatherController extends Controller
{
    private $src = 'https://www.gismeteo.ua/weather-zaporizhia-5093/';

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function home()
    {
        $zap = new Weather($this->src);

        $weather = $zap->getCurrent();

        return view('home', compact('weather'));
    }
}
