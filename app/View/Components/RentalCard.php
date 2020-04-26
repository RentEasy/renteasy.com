<?php

namespace App\View\Components;

use App\Rental;
use Illuminate\View\Component;

class RentalCard extends Component
{

    public $rental;

    public function __construct(Rental $rental)
    {
        $this->rental = $rental;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.rental-card')->with('rental', $this->rental);
    }
}
