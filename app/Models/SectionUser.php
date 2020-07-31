<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SectionUser
 * 
 * @property int $id
 * @property int $identification_number
 * @property int $section_id
 * @property Carbon|null $completed_on
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Section $section
 *
 * @package App\Models
 */
class SectionUser extends Model
{
	protected $table = 'section_user';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'identification_number' => 'int',
		'section_id' => 'int'
	];

	protected $dates = [
		'completed_on'
	];

	protected $fillable = [
		'identification_number',
		'section_id',
		'completed_on'
	];

	public function section()
	{
		return $this->belongsTo(Section::class);
	}
}
