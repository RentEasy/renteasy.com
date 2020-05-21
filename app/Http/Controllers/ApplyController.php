<?php

namespace App\Http\Controllers;

use App\Rental;
use Illuminate\Http\Request;

class ApplyController extends Controller
{

    public function __construct(Request $request)
    {
        $this->middleware(function (Request $request, $next){

            if( ! $request->session()->has('application')) {
                $request->session()->put('application', []);
            }

            return $next($request);
        });
    }

    public function about(Rental $rental)
    {
        return view('rental.apply.about')->with([
            'rental' => $rental,
            'termOptions' => config('options.application.terms'),
            'relationOptions' => config('options.application.relations'),
            'identificationTypeOptions' => config('options.application.identificationTypes'),
            'stateOptions' => config('options.states'),
        ]);
    }

    public function saveAbout(Request $request)
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
            'reference.*.ref_first_name' => 'required',
            'reference.*.ref_last_name' => 'required',
            'reference.*.ref_relation' => 'required',
            'reference.*.ref_phone' => 'required',
        ]);
        dd($request->input());
    }

    public function employment(Rental $rental)
    {
        return view('rental.apply.employment')->with([
            'rental' => $rental,
            'employmentStatusOptions' => config('options.application.employmentStatus'),
            'stateOptions' => config('options.states'),
        ]);
    }

    public function saveEmployment(Request $request)
    {

    }

    public function residence(Rental $rental)
    {
        return view('rental.apply.residence')->with([
            'rental' => $rental,
            'rentOrOwnOptions' => config('options.application.rentOrOwn'),
            'stateOptions' => config('options.states'),
        ]);
    }

    public function saveResidence(Request $request)
    {
        $request->validate([
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
        ]);

    }

    public function occupants(Rental $rental)
    {
        return view('rental.apply.occupants')->with([
            'rental' => $rental,
            'petTypeOptions' => config('options.application.petTypes'),
        ]);
    }

    public function saveOccupants(Request $request)
    {

    }

    public function final(Rental $rental)
    {
        return view('rental.apply.final')->with([
            'rental' => $rental,
            'employmentStatusOptions' => config('options.application.employmentStatus'),
            'relationOptions' => config('options.application.relations'),
            'stateOptions' => config('options.states'),
        ]);
    }

    public function saveFinal(Request $request)
    {

    }

}
