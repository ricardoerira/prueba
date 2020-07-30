<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Section
 * 
 * @property int $id
 * @property int|null $header_id
 * @property string|null $name
 * @property string|null $title
 * @property string|null $subheading
 * @property bool $required_yn
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Header $header
 * @property Collection|Question[] $questions
 * @property Collection|SectionUser[] $section_users
 *
 * @package App\Models
 */
class Section extends Model
{
	protected $table = 'sections';

	protected $casts = [
		'header_id' => 'int',
		'required_yn' => 'bool'
	];

	protected $fillable = [
		'header_id',
		'name',
		'title',
		'subheading',
		'required_yn'
	];

	public function header()
	{
		return $this->belongsTo(Header::class);
	}

	public function questions()
	{
		return $this->belongsToMany(Question::class)
					->withPivot('id')
					->withTimestamps();
	}

	public function section_users()
	{
		return $this->hasMany(SectionUser::class);
	}
}
