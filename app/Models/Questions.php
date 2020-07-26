<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $fillable = [
        'survey_section_id',
        'input_type_id',
        'question_name',
        'question_subtext',
        'question_required_yn',
        'answer_required_yn',
        'allow_mutiple_option_answers_yn'
    ];
}
