<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class InputType
 * 
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Question[] $questions
 *
 * @package App\Models
 */
class InputType extends Model
{
	protected $table = 'input_types';

	protected $fillable = [
		'name',
		'slug'
	];

	public function questions()
	{
		return $this->hasMany(Question::class);
	}
}
