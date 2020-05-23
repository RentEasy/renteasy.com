<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use NumberFormatter;

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
 * @property-read \App\User $landlord
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\RentalPhoto[] $photos
 * @property-read int|null $photos_count
 * @property-read \App\Property $property
 * @property int|null $current_tenancy_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\RentalApplication[] $applications
 * @property-read int|null $applications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rental whereCurrentTenancyId($value)
 */
class Rental extends Model
{

    public function googleDescription()
    {
        $nf = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        $houseModifier = 'single family home';
        $bedroomModifier = $nf->format($this->bedrooms);
        $bathroomModifier = $nf->format($this->bathrooms);
        $applyModifier = is_null($this->current_tenancy_id) ? 'For Rent - ' : '';
        $appModifier = config('app.name');

        $photos = max($this->photos->count(), 2);

        return "{$applyModifier}View $photos photos of {$this->property->address} in {$this->property->city}, {$this->property->state} {$this->property->zipcode}
        a $bedroomModifier bed, $bathroomModifier bath, {$this->sqft} sqft $houseModifier. Explore it and others on $appModifier.";
    }

    public function description()
    {
        $nf = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        $paragraph = [];

        $houseModifier = 'house';
        $bedroomModifier = $nf->format($this->bedrooms);
        $bathroomModifier = $nf->format($this->bathrooms);

        $paragraph[] = "Single family $houseModifier in {$this->property->city} has $bedroomModifier bedrooms and $bathroomModifier bathrooms.";

        if($this->sqft < 700) {
            $paragraph[] = "A small efficient space for living a simpler life.";
        } elseif($this->sqft < 1300) {
            $paragraph[] = "A quaint little burrow for a budding family, or a someone who just needs some space.";
        } elseif ($this->sqft < 2100) {
            $paragraph[] = "An amazing single family $bedroomModifier bedroom $houseModifier.";
        } else {
            $paragraph[] = "A large $houseModifier big enough for most,";
        }

        $paragraph[] = "Located centrally in {$this->property->city}, this $houseModifier is close to shopping & dining.";

        return implode(' ', $paragraph);

    }

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

    public function applications()
    {
        return $this->hasMany(RentalApplication::class);
    }

    public function getPrimaryPhoto()
    {
        $first = $this->photos()->first();
        if (!$first) {
            $fakePhoto = new RentalPhoto();
            $fakePhoto->filename = 'https://picsum.photos/300/200';
            $fakePhoto->rental_id = $this->id;
            return $fakePhoto;
        }
        return $this->photos()->first();
    }

    public function addressHeader()
    {
        return "{$this->property->address} {$this->unit}";
    }

    public function addressFooter()
    {
        return "{$this->property->city}, {$this->property->state} {$this->property->zipcode}";
    }

    public function getRentMonthlyAttribute($value)
    {
        return number_format($value, 2);
    }

    public function getRentDepositAttribute($value)
    {
        return number_format($value, 2);
    }

}
