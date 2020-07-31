<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|ModelHasRole[] $model_has_roles
 * @property Collection|Permission[] $permissions
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Role extends Model
{
	/**
	 * fillable
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'guard_name'
	];

	/**
	 * permissions
	 *
	 * @return void
	 */
	public function permissions()
	{
		return $this->belongsToMany(Permission::class, 'role_has_permissions');
	}

	/**
	 * users
	 *
	 * @return void
	 */
	public function users()
	{
		return $this->hasMany(User::class);
	}

}
