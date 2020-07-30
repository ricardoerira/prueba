<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Organization
 * 
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Header[] $headers
 *
 * @package App\Models
 */
class Organization extends Model
{
	protected $table = 'organizations';

	protected $fillable = [
		'name',
		'slug'
	];

	public function headers()
	{
		return $this->hasMany(Header::class);
	}
}
