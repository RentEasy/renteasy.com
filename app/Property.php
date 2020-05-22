<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use MStaack\LaravelPostgis\Eloquent\PostgisTrait;

/**
 * App\Property
 *
 * @property int $id
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $zipcode
 * @property string $coordinates
 * @property float $bedrooms
 * @property float $bathrooms
 * @property string $parcel
 * @property string $use_code
 * @property int $year_built
 * @property int $sqft
 * @property int $lot_sqft
 * @property int $stories
 * @property int $total_rooms
 * @property bool $basement
 * @property bool $storm_shelter
 * @property bool $exterior_finish
 * @property bool $roof_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereBasement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereBathrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereBedrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereCoordinates($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereExteriorFinish($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereLotSqft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereParcel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereRoofType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereSqft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereStories($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereStormShelter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereTotalRooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereUseCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereYearBuilt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Property whereZipcode($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Rental[] $rentals
 * @property-read int|null $rentals_count
 */
class Property extends Model
{
    use PostgisTrait;

    protected $postgisFields = [
        'coordinates'
    ];

    protected $postgisTypes = [
        'coordinates' => [
            'geomtype' => 'geography',
            'srid' => 4326
        ],
    ];

    protected $fillable = [
        'address',
        'city',
        'state',
        'zipcode'
    ];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

}
