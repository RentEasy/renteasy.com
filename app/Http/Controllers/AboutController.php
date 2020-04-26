<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function forRenters()
    {
        return view('about.for-renters');
    }

    public function forLandlords()
    {
        return view('about.for-landlords');
    }
}
