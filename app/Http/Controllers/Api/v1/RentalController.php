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

        return new RentalCollection($rentals);
    }

    public function info()
    {
        $rentals = Rental::count();
        $coordinates = Property::select(['id', 'coordinates'])->get();

        return response()->json([
            'totalRentals' => $rentals,
            'coordinates' => $coordinates->map(function($row) {
                return ['id'=> $row->id, 'latitude' => $row->coordinates->getLat(), 'longitude' => $row->coordinates->getLng()];
            }),
        ]);
    }


}
