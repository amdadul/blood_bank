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

    public static function getName($type,$code)
    {
        $name = Lookup::where('type','=',$type)->where('code','=',$code)->first();
        return $name->name?$name->name:'N/A';
    }
}
