<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function union()
    {
        return $this->belongsTo(Union::class);
    }
}
