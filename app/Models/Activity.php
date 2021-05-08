<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'activities';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'activity_name', 'activity_description', 'from', 'to', 'employee_id'
    ];

    /**
     * Get employee associated with this Activity
     */
    public function employee() {
        return $this->hasOne('App\Models\Employee');
    }
}
