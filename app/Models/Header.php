<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Header
 * 
 * @property int $id
 * @property int $organization_id
 * @property string|null $name
 * @property string $slug
 * @property string|null $instructions
 * @property string|null $other_header_info
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Organization $organization
 * @property Collection|HeaderComment[] $header_comments
 * @property Collection|Section[] $sections
 * @property Collection|Survey[] $surveys
 *
 * @package App\Models
 */
class Header extends Model
{
	protected $table = 'headers';

	protected $casts = [
		'organization_id' => 'int'
	];

	protected $fillable = [
		'organization_id',
		'name',
		'slug',
		'instructions',
		'other_header_info'
	];

	public function organization()
	{
		return $this->belongsTo(Organization::class);
	}

	public function header_comments()
	{
		return $this->hasMany(HeaderComment::class);
	}

	public function sections()
	{
		return $this->hasMany(Section::class);
	}

	public function surveys()
	{
		return $this->hasMany(Survey::class);
	}
}
