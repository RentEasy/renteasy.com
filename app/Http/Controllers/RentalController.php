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
            'rental' => $rental
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
            'rental_history.*.street_address' => 'required',
            'rental_history.*.unit_apt' => 'required',
            'rental_history.*.city' => 'required',
            'rental_history.*.state' => 'required',
            'rental_history.*.zip' => 'required',
            'rental_history.*.landlord_name' => 'required',
            'rental_history.*.landlord_phone' => 'required',
            'rental_history.*.rent_monthly' => 'required',
            'rental_history.*.rent_own_other' => 'required',
            'rental_history.*.years' => 'required',
            'rental_history.*.months' => 'required',
            // Many
            'employer.*.employer_status' => 'required',
            'employer.*.employer_name' => 'required',
            'employer.*.employer_position' => 'required',
            'employer.*.employer_start_date' => 'required',
            'employer.*.employer_city' => 'required',
            'employer.*.employer_state' => 'required',
            'employer.*.employer_supervisor' => 'required',
            'employer.*.employer_supervisor_phone' => 'required',
            'income_annual' => 'required',
            'income_comments' => 'required',
            'income_proof' => 'required',
// Many
            'reference.*.ref_first_name' => 'required',
            'reference.*.ref_last_name' => 'required',
            'reference.*.ref_relation' => 'required',
            'reference.*.ref_phone' => 'required',
// Many
            'pet.*.pet_type' => 'required',
            'pet.*.pet_breed' => 'required',
            'pet.*.pet_weight' => 'required',
// Many
            'vehicle.*,vehicle_year' => '',
            'vehicle.*,vehicle_make' => '',
            'vehicle.*,vehicle_model' => '',
            'vehicle.*,vehicle_plate' => '',
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

    public function getFormOptions()
    {
        return response()->json([
            'termOptions' => config('options.application.terms'),
            'rentOrOwnOptions' => config('options.application.rentOrOwn'),
            'petTypeOptions' => config('options.application.petTypes'),
            'stateOptions' => config('options.states'),
            'relationOptions' => config('options.application.relations'),
            'identificationTypeOptions' => config('options.application.identificationTypes'),
            'employmentStatusOptions' => config('options.application.employmentStatus'),
        ]);
    }

}
