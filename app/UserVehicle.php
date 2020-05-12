<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserVehicle extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
