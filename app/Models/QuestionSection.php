<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class QuestionSection
 * 
 * @property int $id
 * @property int $section_id
 * @property int $question_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Question $question
 * @property Section $section
 *
 * @package App\Models
 */
class QuestionSection extends Model
{
	protected $table = 'question_section';

	protected $casts = [
		'section_id' => 'int',
		'question_id' => 'int'
	];

	protected $fillable = [
		'section_id',
		'question_id'
	];

	public function question()
	{
		return $this->belongsTo(Question::class);
	}

	public function section()
	{
		return $this->belongsTo(Section::class);
	}
}
