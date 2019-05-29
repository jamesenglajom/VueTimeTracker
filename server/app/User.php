<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

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

    // ==============================================================================
    
    // relations

    public function time_tracker(){
        return $this->hasMany('App\TrackerRecord');
    }

    // end relations

    // ==============================================================================

    //accessors

    public function getNameAttribute($name){
        return ucfirst($name);
    }
    
    public function getEmailAttribute($email){
        return $email;
    }

    // end accessors

    // ==============================================================================

    //mutators

    public function setNameAttribute($name){
        $this->attributes['name'] = strtolower($name);
    }
    
    public function setEmailAttribute($email){
        $this->attributes['email'] = strtolower($email);
    }

    // end mutators

    // ==============================================================================


}