<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('pages.about');
    }

    public function bureauEtudes()
    {
        return view('pages.bureau-etudes');
    }

    public function productionTerrain()
    {
        return view('pages.production-terrain');
    }
}
