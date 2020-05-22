<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RentalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'address' => $this->property->address,
            'city' => $this->property->city,
            'state' => $this->property->state,
            'zipcode' => $this->property->zipcode,

            'unit' => $this->unit,
            'sqft' => $this->sqft,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'rent_deposit' => $this->rent_deposit,
            'rent_monthly' => $this->rent_monthly,
            'listing_date' => $this->listing_date,

            'primary_photo_url' => asset('storage/' . $this->getPrimaryPhoto()->filename),
            'link' => route('rentals.show', [$this])
        ];
    }
}
