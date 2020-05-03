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

    public function company()
    {
        return view('about.company');
    }

    public function privacy()
    {
        return view('about.privacy');
    }

    public function terms()
    {
        return view('about.terms');
    }

    public function cookie()
    {
        return view('about.cookie');
    }

    public function newsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'agree' => 'required|accepted'
        ]);

        return response()->json([
            'status' => 'success'
        ]);
    }
}
