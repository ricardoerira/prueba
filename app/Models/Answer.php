<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Answer
 * 
 * @property int $id
 * @property int $survey_id
 * @property int $identification
 * @property string|null $text
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Survey $survey
 *
 * @package App\Models
 */
class Answer extends Model
{
	protected $table = 'answers';

	protected $casts = [
		'survey_id' => 'int',
		'identification' => 'int'
	];

	protected $fillable = [
		'survey_id',
		'identification',
		'text'
	];

	public function survey()
	{
		return $this->belongsTo(Survey::class);
	}
}
