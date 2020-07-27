<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyHeader extends Model
{
    protected $fillable = [
        "organization_id",
        "survey_name",
        "slug",
        "instructions",
        "other_header_info"
    ];
}
