<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PickUpStation extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'county', 'firststation','secondstation','thirdstation','1stationcost','2stationcost','3stationcost'
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
