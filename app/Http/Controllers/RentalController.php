<?php

namespace App\Http\Controllers;

use App\Property;
use App\Rental;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rental.create');
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

        foreach($request->file('photos') as $i => $file) {
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

        return redirect(route('rentals.show', ['rental' => $rental]));
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
            'similarRentals' => Rental::limit(10)->inRandomOrder()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
