<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InputTypes extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

}
