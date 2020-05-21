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
            'email' => 'required|unique:users,email',
            'phone' => 'required',
            'identification' => 'required|array|min:1',
            'identification.*.id_type' => 'required',
            'identification.*.id_state' => 'required',
            'identification.*.id_number' => 'required',
            // Many
            'rental_history' => 'required|array|min:1',
            'rental_history.*.street_address' => 'required',
            'rental_history.*.unit_apt' => '',
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
            'employer' => 'required|array|min:1',
            'employer.*.employer_status' => 'required',
            'employer.*.employer_name' => 'required',
            'employer.*.employer_position' => 'required',
            'employer.*.employer_start_date' => 'required',
            'employer.*.employer_end_date' => 'required',
            'employer.*.employer_city' => 'required',
            'employer.*.employer_state' => 'required',
            'employer.*.employer_supervisor' => 'required',
            'employer.*.employer_supervisor_phone' => 'required',
            'employer.*.income_annual' => 'required',
            'employer.*.income_comments' => 'required',
            'employer.*.income_proof' => 'required',
// Many
            'reference' => 'required|array|min:1',
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

        list($user, $application) = DB::transaction(function() use($request, $rental) {
            $user = User::create([
                'first_name' => $request->get('first_name'),
                'middle_name' => $request->get('middle_name', ''),
                'last_name' => $request->get('last_name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
            ]);

            $application = new RentalApplication();
            $application->user_id = $user->id;
            $application->applied_at = new \DateTime();

            $rental->applications()->save($application);

            foreach($request->input('employer', []) as $employerInput) {
                $ue = new RentalApplicationEmployment();
                $ue->status = $employerInput['employer_status'];
                $ue->name = $employerInput['employer_name'];
                $ue->position = $employerInput['employer_position'];
                $ue->start_date = new \DateTime();
                $ue->end_date = new \DateTime();
                $ue->city = $employerInput['employer_city'];
                $ue->state = $employerInput['employer_state'];
                $ue->supervisor = $employerInput['employer_supervisor'];
                $ue->supervisor_phone = $employerInput['employer_supervisor_phone'];
                $ue->income_annual = $employerInput['income_annual'];
                $ue->income_comments = $employerInput['income_comments'];

                $application->employments()->save($ue);
            }

            foreach($request->input('reference', []) as $referenceInput) {
                $ref = new RentalApplicationReference();
                $ref->first_name = $referenceInput['ref_first_name'];
                $ref->last_name = $referenceInput['ref_last_name'];
                $ref->relation = $referenceInput['ref_relation'];
                $ref->phone = $referenceInput['ref_phone'];

                $application->references()->save($ref);
            }

            foreach($request->input('identification', []) as $idenInput) {
                $iden = new RentalApplicationIdentification();
                $iden->type = $idenInput['id_type'];
                $iden->state = $idenInput['id_state'];
                $iden->number = $idenInput['id_number'];

                $application->identifications()->save($iden);
            }

            foreach($request->input('rental_history', []) as $rentalHistoryInput) {
                $rHistory = new RentalApplicationRentalHistory();

                $rHistory->street_address = $rentalHistoryInput['street_address'];
                $rHistory->unit_apt = $rentalHistoryInput['unit_apt'];
                $rHistory->city = $rentalHistoryInput['city'];
                $rHistory->state = $rentalHistoryInput['state'];
                $rHistory->zip = $rentalHistoryInput['zip'];
                $rHistory->landlord_name = $rentalHistoryInput['landlord_name'];
                $rHistory->landlord_phone = $rentalHistoryInput['landlord_phone'];
                $rHistory->rent_monthly = $rentalHistoryInput['rent_monthly'];
                $rHistory->rent_own_other = $rentalHistoryInput['rent_own_other'];
                $rHistory->start_date = new \DateTime();
                $rHistory->end_date = new \DateTime();

                $application->rentalHistories()->save($rHistory);
            }
            foreach($request->input('vehicle', []) as $vehicleInput) {
                $vehicle = new RentalApplicationVehicle();
                $vehicle->year = $vehicleInput['vehicle_year'];
                $vehicle->make = $vehicleInput['vehicle_make'];
                $vehicle->model = $vehicleInput['vehicle_model'];
                $vehicle->plate = $vehicleInput['vehicle_plate'];

                $application->vehicles()->save($vehicle);
            }
            foreach($request->input('pet', []) as $petInput) {
                $pet = new RentalApplicationPet();
                $pet->type = $petInput['pet_type'];
                $pet->breed = $petInput['pet_breed'];
                $pet->weight = $petInput['pet_weight'];

                $application->pets()->save($pet);
            }

            return [$user, $application];
        });

        Mail::to($user)->send(new RentalApplicationConfirmation($application));

        return response()->json();
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
