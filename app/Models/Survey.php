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

  /**
   * answers
   *
   * @return void
   */
  public function answersQuestion()
  {
    return Answer::whereIn( 'question_id', [
      2, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30
    ])->get();
  }

  public function surveyed()
  {
    return $this->belongsTo(User::class, 'surveyed_id', 'id');
  }

}
