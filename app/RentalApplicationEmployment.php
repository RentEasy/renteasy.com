<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentalApplicationEmployment extends Model
{

    public $dates = [
        'start_date', 'end_date'
    ];

    public function tenure()
    {
        $interval = $this->start_date->diff($this->end_date);
        return $interval->y . " years, " . $interval->m." months";
    }

    public function application()
    {
        return $this->belongsTo(RentalApplication::class);
    }

}
