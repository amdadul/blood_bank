<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function union()
    {
        return $this->belongsTo(Union::class,'union_id','id');
    }

    public function bloodRequestAccept()
    {
        return $this->hasMany(BloodRequestAccept::class);
    }

    public function history()
    {
        return $this->hasMany(Histories::class);
    }
}
