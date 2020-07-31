<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Choice
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Question[] $questions
 *
 * @package App\Models
 */
class Choice extends Model
{
	/**
	 * fillable
	 *
	 * @var array
	 */
	protected $fillable = [
		'name'
	];

	/**
	 * questions
	 *
	 * @return void
	 */
	public function questions()
	{
		return $this->belongsToMany(Question::class)
			->withPivot('id')
			->withTimestamps();
	}

}
