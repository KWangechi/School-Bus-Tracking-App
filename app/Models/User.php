<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'password',
        'role_id',

    ];

    // protected $guard = ['email'];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_registered' => 'date'
    ];

    const role_admin = 1;
    const role_driver = 2;
    const role_parent = 3;


    public function drivers()
    {
        return $this->hasOne(Driver::class);
    }

    public function parents()
    {
        return $this->hasOne(Guardian::class);
    }

    // public function userRoles()
    // {
    //     return $this->hasOne(UserRole::class, 'user_id');
    // }
    
    public function role()
    {
        return $this->hasOne(Role::class);
    }
}
