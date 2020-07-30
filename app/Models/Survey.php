<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Survey
 * 
 * @property int $id
 * @property int $identification
 * @property int|null $header_id
 * @property Carbon|null $start_time
 * @property Carbon|null $completion_time
 * @property string $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Header $header
 * @property Collection|Answer[] $answers
 *
 * @package App\Models
 */
class Survey extends Model
{
	protected $table = 'surveys';

	protected $casts = [
		'identification' => 'int',
		'header_id' => 'int'
	];

	protected $dates = [
		'start_time',
		'completion_time'
	];

	protected $fillable = [
		'identification',
		'header_id',
		'start_time',
		'completion_time',
		'slug'
	];

	public function header()
	{
		return $this->belongsTo(Header::class);
	}

	public function answers()
	{
		return $this->hasMany(Answer::class);
	}
}
