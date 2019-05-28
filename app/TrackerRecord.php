<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TrackerRecord extends Model
{
    protected $fillable = ['user_id','time_in', 'time_out'];
    protected $appends =['duration'];


    // ==============================================================================

    // relations

    public function user(){
        return $this->belongsTo('App\User');
    }

    // end relations

    // ==============================================================================

    //mutators

    public function getTimeInAttribute($value) {
        return $value;
    }

    public function getTimeOutAttribute($value) {
        return $value;
    }

    public function getDurationAttribute() {
        $start = Carbon::parse($this->time_in);
        $end = ($this->time_out) ? Carbon::parse($this->time_out) : Carbon::now();
        $difference  = $end->diffInSeconds($start);

        return $difference;
    }

    //end mutators
}