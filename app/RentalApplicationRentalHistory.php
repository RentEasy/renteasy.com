<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentalApplicationRentalHistory extends Model
{
    public $dates = [
        'start_date', 'end_date'
    ];

    public function tenure()
    {
        $interval = $this->start_date->diff($this->end_date);
        return $interval->y . " years, " . $interval->m . " months";
    }


    public function getRentMonthlyAttribute($value)
    {
        if (!$value) $value = 0.00;
        return number_format($value, 2);
    }


    public function application()
    {
        return $this->belongsTo(RentalApplication::class);
    }

}
