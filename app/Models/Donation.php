<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'donations';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'box_name', 'amount_collected', 'image_path', 'employee_id'
    ];

    /**
     * Get employee associated with this Donation
     */
    public function employee() {
        return $this->hasOne('App\Models\Employee');
    }
}
