<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Answer
 */
class Answer extends Model
{
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'question_id',
		'survey_id',
		'choice_id',
		'text'
	];

	/**
	 * survey
	 *
	 * @return void
	 */
	public function survey()
	{
		return $this->belongsTo(Survey::class);
	}

	public function choice()
	{
		return $this->belongsTo(Choice::class);
	}

	public function question()
	{
		return $this->belongsTo(Question::class);
	}

}
