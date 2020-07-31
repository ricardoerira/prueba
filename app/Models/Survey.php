<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'user_id',
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
