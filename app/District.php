<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $guarded=[];

    public function policeStations()
    {
        return $this->hasMany(PoliceStation::class);
    }
}
