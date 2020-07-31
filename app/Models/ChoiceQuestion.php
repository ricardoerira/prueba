<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChoiceQuestion
 * 
 * @property int $id
 * @property int $question_id
 * @property int $choice_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Choice $choice
 * @property Question $question
 *
 * @package App\Models
 */
class ChoiceQuestion extends Model
{
	protected $table = 'choice_question';

	protected $casts = [
		'question_id' => 'int',
		'choice_id' => 'int'
	];

	protected $fillable = [
		'question_id',
		'choice_id'
	];

	public function choice()
	{
		return $this->belongsTo(Choice::class);
	}

	public function question()
	{
		return $this->belongsTo(Question::class);
	}
}
