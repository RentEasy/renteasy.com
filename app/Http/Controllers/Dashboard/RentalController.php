<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Property;
use App\Rental;
use App\RentalApplication;
use App\RentalPhoto;
use App\RentalTenancy;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('dashboard.rentals.index', [
            'rentals' => $request->user()->rentals()->paginate(30)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.rentals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'rent_monthly' => 'required|numeric',
            'rent_deposit' => 'required|numeric',
        ]);

        $property = Property::firstOrCreate([
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zipcode' => $request->zipcode,
        ]);


        $rental = new Rental();
        $rental->rent_deposit = $request->rent_deposit;
        $rental->rent_monthly = $request->rent_monthly;
        $rental->listing_date = new \DateTime();

        $rental->landlord()->associate($request->user());
        $property->rentals()->save($rental);

        foreach ($request->file('photos') as $i => $file) {
            $path = $file->storePublicly("public/rentals/{$rental->id}");
            if (!$path) {
                // failed to upload?
            }

            $photo = new RentalPhoto();
            $photo->name = $file->getFilename();
            $photo->filename = $path;
            $photo->order = $i;
            $rental->photos()->save($photo);
        }

        return redirect(route('dashboard.rentals.show', ['rental' => $rental]));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Rental $rental)
    {
        return view('dashboard.rentals.show')->with([
            'rental' => $rental,
            'similarRentals' => Rental::limit(3)->inRandomOrder()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rental $rental)
    {
        return view('dashboard.rentals.edit')->with([
            'rental' => $rental
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rental $rental)
    {
        dd($request, $rental);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function lease(Rental $rental, RentalTenancy $tenancy)
    {
        return view('dashboard.lease.lease')->with([
            'rental' => $rental,
            'tenancy' => $tenancy
        ]);
    }

    public function approveApplication(Rental $rental, RentalApplication $app, Request $request)
    {
        $tenancy = new RentalTenancy();
        $tenancy->rental_id = $app->rental_id;
        $tenancy->landlord_id = $app->rental->landlord_id;
        $tenancy->tenant_id = $app->user_id;

        $tenancy->rent_periodicity = 'P1M';

        $tenancy->rent_deposit = $app->rental->rent_deposit;
        $tenancy->rent_monthly = $app->rental->rent_monthly;

        $tenancy->application_fees = 0.00;

        $tenancy->late_payment_fees = 0.00;
        $tenancy->late_payment_after = 'P5D';
        $tenancy->late_payment_periodicity = 'P1D';

        $tenancy->save();

        $rental->current_tenancy_id = $tenancy->id;
        $rental->save();

        // @TODO: Reject other applications... Domain logic!

        return redirect()->back();
    }
}
