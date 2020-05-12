<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserIdentification extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
