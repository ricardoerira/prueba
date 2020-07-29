<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'input_type_id',
        'question_name',
        'question_subtext',
        'question_required_yn',
        'answer_required_yn',
        'allow_mutiple_option_answers_yn'
    ];

    public function inputType()
    {
        return $this->belongsTo(InputTypes::class);
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class);
    }

    public function choices()
    {
        return $this->belongsToMany(Choice::class);
    }

}
