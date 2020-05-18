<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\RentalApplication
 *
 * @property int $id
 * @property int $rental_id
 * @property int $user_id
 * @property string $applied_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Rental $rental
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalApplication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalApplication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalApplication query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalApplication whereAppliedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalApplication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalApplication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalApplication whereRentalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalApplication whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RentalApplication whereUserId($value)
 * @mixin \Eloquent
 */
class RentalApplication extends Model
{

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function employments()
    {
        return $this->hasMany(RentalApplicationEmployment::class);
    }

    public function identifications()
    {
        return $this->hasMany(RentalApplicationIdentification::class);
    }

    public function pets()
    {
        return $this->hasMany(RentalApplicationPet::class);
    }

    public function references()
    {
        return $this->hasMany(RentalApplicationReference::class);
    }

    public function rentalHistories()
    {
        return $this->hasMany(RentalApplicationRentalHistory::class);
    }

    public function vehicles()
    {
        return $this->hasMany(RentalApplicationVehicle::class);
    }


}
