<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'phone_number',
        'civil_id',
        'stop_number',
        'nationality',
        'gender',
        'social_status',
        'age',
        'diets_before',
        'height',
        'current_weight',
        'physical_activity',
        'medications',
        'water_intake',
        'appetite',
        'sleep',
        'password',
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
}
