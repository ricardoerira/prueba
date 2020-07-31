<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Survey
 */
class Survey extends Model
{
  /**
   * fillable
   *
   * @var array
   */
  protected $fillable = [
    'user_id',
    'header_id',
    'start_time',
    'completion_time',
  ];

  /**
   * header
   *
   * @return void
   */
  public function header()
  {
    return $this->belongsTo(Header::class);
  }

  /**
   * answers
   *
   * @return void
   */
  public function answers()
  {
    return $this->hasMany(Answer::class);
  }
}
