<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function policeStations()
    {
        return $this->hasMany(PoliceStation::class);
    }
}
