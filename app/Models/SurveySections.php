<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveySections extends Model
{
    protected $fillable = [
        'survey_header_id',
        'section_name',
        'section_title',
        'section_subheading',
        'section_required_yn'
    ];
}
