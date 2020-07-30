<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HeaderComment
 * 
 * @property int $id
 * @property int $header_id
 * @property int $identification_number
 * @property string|null $comments
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Header $header
 *
 * @package App\Models
 */
class HeaderComment extends Model
{
	protected $table = 'header_comments';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'header_id' => 'int',
		'identification_number' => 'int'
	];

	protected $fillable = [
		'header_id',
		'identification_number',
		'comments'
	];

	public function header()
	{
		return $this->belongsTo(Header::class);
	}
}
