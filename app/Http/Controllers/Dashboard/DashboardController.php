<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\RentalApplication;
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
        $applications = RentalApplication::whereIn('rental_id', $rentals->get('id'));
        $monthlyIncome = number_format($rentals->sum('rent_monthly'), 2);
        $ytdIncome = number_format($rentals->sum('rent_monthly') * 4, 2);

        return view('dashboard.index', [
            'rentals' => $rentals->limit(8)->get(),
            'applications' => $applications->get(),
            'totalRentals' => $rentals->count(),
            'monthlyIncome' => $monthlyIncome,
            'ytdIncome' => $ytdIncome
        ]);
    }

}
