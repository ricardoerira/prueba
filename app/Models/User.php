<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * User
 */
class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'password', 'role_id', 'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * role
     *
     * @return void
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function observations()
    {
        return $this->hasMany(Observation::class);
    }

    public function surveys()
    {
        return $this->hasMany(Survey::class);
    }

    public function surveyHeaderData()
    {
        return $this->hasMany(Survey::class, 'surveyed_id')->with("answersQuestion")->where("header_id", 2);
    }

}
