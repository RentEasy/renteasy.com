<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\RentalCollection;
use App\Property;
use App\Rental;

class RentalController extends Controller
{

    public function index()
    {
        $rentals = Rental::with('property')->paginate(16);
        $rentalsInRange = '';

        return new RentalCollection($rentals);
    }

    public function info()
    {
        $rentals = Rental::count();
        $coordinates = Property::get()->pluck('coordinates');

        return response()->json([
            'totalRentals' => $rentals,
            'coordinates' => $coordinates->map(function($v) {
                return ['latitude' => $v->getLat(), 'longitude' => $v->getLng()];
            }),
        ]);
    }


}
