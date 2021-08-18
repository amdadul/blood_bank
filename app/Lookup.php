<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lookup extends Model
{
    protected $table = 'lookups';
    protected $guarded = [];

    public static function loadItems($type)
    {
        return Lookup::where('type','=',$type)->get();
    }
}
