<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodRequestAccept extends Model
{
    protected $guarded=[];

    public static function isAccepted($requestId,$userId)
    {
        $accepted = BloodRequestAccept::where('request_id','=',$requestId)
                ->where('user_id','=',$userId)
                ->where('status','=',1)->get();
        return count($accepted)==0?false:true;
    }

    public static function isManaged($requestId)
    {
        $managed = BloodRequestAccept::where('request_id','=',$requestId)
            ->where('status','=',1)->get();
        return count($managed)<3?false:true;
    }

    public static function Managed($requestId)
    {
        $managed = BloodRequestAccept::where('request_id','=',$requestId)
            ->where('status','=',1)->get();
        return count($managed)==3?true:false;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bloodRequest()
    {
        return $this->belongsTo(BloodRequest::class);
    }
}
