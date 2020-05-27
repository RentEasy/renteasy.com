<?php

namespace App\Http\Controllers;

use App\Mail\RentalApplicationConfirmation;
use App\Property;
use App\Rental;
use App\RentalApplication;
use App\RentalApplicationEmployment;
use App\RentalApplicationIdentification;
use App\RentalApplicationPet;
use App\RentalApplicationReference;
use App\RentalApplicationRentalHistory;
use App\RentalApplicationVehicle;
use App\RentalPhoto;
use App\User;
use App\UserEmployment;
use App\UserPet;
use App\UserReference;
use App\UserRentalHistory;
use App\UserVehicle;
use DB;
use Hash;
use Illuminate\Http\Request;
use Mail;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rental.index', [
            'rentals' => Rental::paginate(16)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Rental $rental)
    {
        return view('rental.show')->with([
            'rental' => $rental,
            'similarRentals' => Rental::limit(3)->inRandomOrder()->get()
        ]);
    }

}
