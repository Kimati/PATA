<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wearable extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','price','seller_phone','seller_email', 'county','subcounty','division','location', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
