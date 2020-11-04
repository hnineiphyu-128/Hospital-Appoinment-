<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    //
    use SoftDeletes;
    protected $fillable=[
    	'day', 'time', 'doctor_id'
    ];
    public function doctor()
    {
    	return $this->belongsTo('App\Doctor');
    }
    public function patients()
    {
    	return $this->belongsToMany('App\Patient','appoinments','patient_id','schedule_id')->withPivot('appoinment_Date')
    		->withTimestamps();
    }
}
