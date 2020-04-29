<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
