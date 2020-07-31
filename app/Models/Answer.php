<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'question_id',
		'survey_id',
		'text'
	];

	public function survey()
	{
		return $this->belongsTo(Survey::class);
	}
}
