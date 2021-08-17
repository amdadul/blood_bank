<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Histories extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bloodRequest()
    {
        return $this->belongsTo(BloodRequest::class);
    }
}
