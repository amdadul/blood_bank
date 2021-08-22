<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lookup extends Model
{
    protected $table = 'lookups';
    protected $guarded = [];

    const LOGIN = 2;
    const lOGOUT = 5;
    const REGISTER = 1;
    const REQUEST = 3;
    const DONATE = 4;
    const ACCEPT = 6;

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
