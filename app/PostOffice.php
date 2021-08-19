<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostOffice extends Model
{
    protected $guarded=[];

    public function policeStation()
    {
        return $this->belongsTo(PoliceStation::class);
    }

    public function union()
    {
        return $this->hasMany(Union::class);
    }
}
