<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $fillable = [
        'name'
    ];

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }
}
