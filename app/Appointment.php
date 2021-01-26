<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'user_id',
        'name',
        'phone_number',
        'civil_id',
        'admin_id',
        'date',
        'time',
    ];

    public function user(){
            return $this->belongsTo('App\User','user_id');
    }

    public function admin(){
            return $this->belongsTo('App\Admin','admin_id');
    }

}
