<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    //
    use SoftDeletes;
    protected $fillable=[
    	'name', 'age', 'gender', 'phone', 'address', 'doctor_id', 'user_id'
    ];
    public function doctor()
    {
    	return $this->belongsTo('App\Doctor');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function schedules()
    {
    	return $this->belongsToMany('App\Schedule','appoinments','patient_id','schedule_id')->withPivot('appoinment_Date')
    		->withTimestamps();
    }
}
