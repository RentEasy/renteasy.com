<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $rentals = $request->user()->rentals();
        $monthlyIncome = number_format($rentals->sum('rent_monthly'), 2);
        $ytdIncome = number_format($rentals->sum('rent_monthly') * 4, 2);

        return view('dashboard.index', [
            'rentals' => $rentals->limit(8)->get(),
            'totalRentals' => $rentals->count(),
            'monthlyIncome' => $monthlyIncome,
            'ytdIncome' => $ytdIncome
        ]);
    }

    public function rentals(Request $request)
    {
        return view('dashboard.rentals', [
            'rentals' => $request->user()->rentals()->paginate(30)
        ]);
    }

}
