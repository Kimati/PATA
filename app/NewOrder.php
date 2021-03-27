<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewOrder extends Model
{
    //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'custfirstname','custsecondname','custphone','custemail','itemname', 'itemquantity', 'itemcost', 'pickupcounty','pickupstation','shiftingfee','totalcost','ordernumber'
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
