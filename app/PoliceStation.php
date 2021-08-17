<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PoliceStation extends Model
{
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function postOffice()
    {
        return $this->hasMany(PostOffice::class);
    }
}
