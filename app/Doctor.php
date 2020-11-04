<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    //
    use SoftDeletes;
    protected $fillable=[
    	'user_id', 'profile', 'language', 'qualification', 'phone', 'cost', 'speciality_id'
    ];
    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
    public function speciality()
    {
    	return $this->belongsTo('App\Speciality');
    }
    public function schedules()
    {
    	return $this->hasMany('App\Schedule');
    }
    public function patients()
    {
        return $this->hasMany('App\Patient');
    }
}
