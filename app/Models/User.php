<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
        'email',
        'password',
        'role',
    ];

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
    ];

    /**
     * Get the user_detail associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userDetail()
    {
        return $this->hasOne(UserDetail::class);
    }

    /**
     * Get all of the goods for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function goods()
    {
        return $this->hasMany(Goods::class);
    }

    public function isAdmin()
    {
        if($this->role == 'admin')
        { 
            return true; 
        } 
        else 
        { 
            return false; 
        }
    }

    public function isPenjual()
    {
        if($this->role == 'penjual')
        { 
            return true; 
        } 
        else 
        { 
            return false; 
        }
    }

    public function isPembeli()
    {
        if($this->role == 'pembeli')
        { 
            return true; 
        } 
        else 
        { 
            return false; 
        }
    }

    public function hasRole($role) {
        switch ($role) {
            case 'admin': return \Auth::user()->isAdmin();
            case 'penjual': return \Auth::user()->isPenjual();
            case 'pembeli': return \Auth::user()->isPembeli();
        }
        return false;
    }
}
