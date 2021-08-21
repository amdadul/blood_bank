<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=[];
    /*protected $fillable = [
        'name', 'email', 'password',
    ];*/

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function donor()
    {
        return $this->belongsTo(Donor::class,'user_id');
    }

    public function bloodRequest()
    {
        return $this->hasMany(BloodRequest::class);
    }

    public function bloodRequestAccept()
    {
        return $this->hasMany(BloodRequestAccept::class);
    }

    public function feedBack()
    {
        return $this->hasMany(FeedBack::class);
    }

    public function reviewer()
    {
        return $this->hasMany(FeedBack::class);
    }

    public function history()
    {
        return $this->hasMany(Histories::class);
    }
}
