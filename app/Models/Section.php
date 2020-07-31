<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'title',
        'subheading',
        'required_yn'
    ];

    public function headers()
    {
        return $this->belongsToMany(Header::class, 'header_section')
            ->withTimestamps()
            ->withPivot('priority'); ;
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class)->withTimestamps();
    }

}
