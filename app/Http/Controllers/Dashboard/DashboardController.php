<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
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

}
