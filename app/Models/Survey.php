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
    'header_id',
    'surveyed_id',
    'pollster_id',
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

  public function surveyed()
  {
    return $this->belongsTo(User::class, 'surveyed_id', 'id');
  }

}
