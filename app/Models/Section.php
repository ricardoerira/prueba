<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'header_id',
        'section_name',
        'section_title',
        'section_subheading',
        'section_required_yn'
    ];
}
