<?php

namespace App\Http\Controllers;

use App\Property;
use App\Rental;
use App\RentalApplication;
use App\RentalPhoto;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

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

    public function apply(Rental $rental, Request $request)
    {
        $app = new RentalApplication();
        $app->applied_at = new \DateTime();
        $app->user()->associate($request->user());

        $rental->applications()->save($app);

        return redirect()->back()->with('status', 'Successfully submitted application!');
    }

}
