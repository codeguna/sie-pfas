<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Hash;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 */
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $fillable = ['name', 'email', 'password', 'remember_token', 'google_id'];


    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }


    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function employee()
    {
        return $this->hasOne('App\Models\Employee');
    }
    public function lecturer()
    {
        return $this->hasOne('App\Models\Lecturer');
    }

    public function bap()
    {
        return $this->hasOne('App\Models\Bap');
    }
}
