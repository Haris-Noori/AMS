<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationBox extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'donation_boxes';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'box_name', 'reference', 'collector', 'frequency', 'location_name', 'address', 'city'
    ];

}
