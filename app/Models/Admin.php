<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Admin as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
{
    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admins';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'admin_name', 'admin_pass', 'type',
    ];
    

    /**
     * Check if Admin is logged in
     * @return bool
     */
    public static function isLoggedIn() {
        return session('session_admin_id', false);
    }
}
