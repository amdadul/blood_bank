<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Union extends Model
{
    public function postOffice()
    {
        return $this->belongsTo(PostOffice::class);
    }

    public function donor()
    {
        return $this->hasMany(Donor::class);
    }

    public function bloodRequest()
    {
        return $this->hasMany(BloodRequest::class);
    }
}
