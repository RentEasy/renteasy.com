<?php

namespace App\Http\Controllers;

use App\Property;
use App\Rental;
use App\RentalApplication;
use App\RentalPhoto;
use Illuminate\Http\Request;

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

    public function apply(Rental $rental)
    {
        return view('rental.apply')->with([
            'rental' => $rental,
            'termOptions' => config('options.application.terms'),
            'rentOrOwnOptions' => config('options.application.rentOrOwn'),
            'petTypeOptions' => config('options.application.petTypes'),
            'stateOptions' => config('options.states'),
            'relationOptions' => config('options.application.relations'),
            'identificationTypeOptions' => config('options.application.identificationTypes'),
            'employmentStatusOptions' => config('options.application.employmentStatus'),
        ]);
    }

    public function submitApplication(Rental $rental, Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'middle_name' => '',
            'last_name' => 'required',
            'suffix' => '',
            'preferred_move_in' => '',
            'preferred_term' => '',
            'email' => 'required',
            'phone' => 'required',
            'id_type' => 'required',
            'id_state' => 'required',
            'id_number' => 'required',
// Many
//            'street_address' => 'required',
//            'unit_apt' => 'required',
//            'city' => 'required',
//            'state' => 'required',
//            'zip' => 'required',
//            'landlord_name' => 'required',
//            'landlord_phone' => 'required',
//            'rent_monthly' => 'required',
//            'rent_own_other' => 'required',
//            'years' => 'required',
//            'months' => 'required',
// Many
//            'employer_status' => 'required',
//            'employer_name' => 'required',
//            'employer_position' => 'required',
//            'employer_start_date' => 'required',
//            'employer_city' => 'required',
//            'employer_state' => 'required',
//            'employer_supervisor' => 'required',
//            'employer_supervisor_phone' => 'required',
            'income_annual' => 'required',
            'income_comments' => 'required',
            'income_proof' => 'required',
// Many
//            'ref_first_name' => 'required',
//            'ref_last_name' => 'required',
//            'ref_relation' => 'required',
//            'ref_phone' => 'required',
// Many
//            'pet_type' => 'required',
//            'pet_breed' => 'required',
//            'pet_weight' => 'required',
// Many
//            'vehicle_year' => 'required',
//            'vehicle_make' => 'required',
//            'vehicle_model' => 'required',
//            'vehicle_plate' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);

        dd($request->input());
    }

    public function simpleApply(Rental $rental, Request $request)
    {
        $app = new RentalApplication();
        $app->applied_at = new \DateTime();
        $app->user()->associate($request->user());

        $rental->applications()->save($app);

        return redirect()->back()->with('status', 'Successfully submitted application!');
    }

}
