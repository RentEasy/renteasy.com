<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Rental
 *
 * @property int $id
 * @property int $property_id
 * @property int $landlord_id
 * @property string $unit
 * @property int $sqft
 * @property float $bedrooms
 * @property float $bathrooms
 * @property int $stories
 * @property float $rent_deposit
 * @property float $rent_monthly
 * @property string $listing_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rental newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rental newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rental query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rental whereBathrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rental whereBedrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rental whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rental whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rental whereLandlordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rental whereListingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rental wherePropertyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rental whereRentDeposit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rental whereRentMonthly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rental whereSqft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rental whereStories($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rental whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rental whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Rental extends Model
{
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function landlord()
    {
        return $this->belongsTo(User::class);
    }

    public function photos()
    {
        return $this->hasMany(RentalPhoto::class);
    }

    public function getPrimaryPhoto()
    {
        return $this->photos()->first();
    }

}
