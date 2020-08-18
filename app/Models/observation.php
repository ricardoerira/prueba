<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    protected $fillable = [
        "user_id",
        "level_id",
        "observation",
        "call",
        "email",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
