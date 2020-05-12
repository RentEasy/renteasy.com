<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRentalHistory extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
