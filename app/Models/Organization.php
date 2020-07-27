<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];

    public function headers()
    {
        return $this->hasMany('App\Models\header');
    }
}
