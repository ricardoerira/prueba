<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Question
 *
 * @property int $id
 * @property int $input_type_id
 * @property string $name
 * @property string|null $subtext
 * @property bool|null $required_yn
 * @property bool|null $answer_required_yn
 * @property bool|null $allow_mutiple_option_answers_yn
 * @property int|null $dependent_question_id
 * @property int|null $dependent_question_option_id
 * @property int|null $dependent_answer_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property InputType $input_type
 * @property Collection|Choice[] $choices
 * @property Collection|Section[] $sections
 *
 * @package App\Models
 */
class Question extends Model
{
	/**
	 * casts
	 *
	 * @var array
	 */
	protected $casts = [
		'input_type_id' => 'int',
		'required_yn' => 'bool',
		'answer_required_yn' => 'bool',
		'allow_mutiple_option_answers_yn' => 'bool',
		'dependent_question_id' => 'int',
		'dependent_question_option_id' => 'int',
		'dependent_answer_id' => 'int'
	];

	/**
	 * fillable
	 *
	 * @var array
	 */
	protected $fillable = [
		'input_type_id',
		'name',
		'subtext',
		'required_yn',
		'answer_required_yn',
		'allow_mutiple_option_answers_yn',
		'dependent_question_id',
		'dependent_question_option_id',
		'dependent_answer_id'
	];

	/**
	 * inputType
	 *
	 * @return void
	 */
	public function inputType()
	{
		return $this->belongsTo(InputType::class);
	}

	/**
	 * choices
	 *
	 * @return void
	 */
	public function choices()
	{
		return $this->belongsToMany(Choice::class)
			->withPivot('id')
			->withTimestamps();
	}

	/**
	 * sections
	 *
	 * @return void
	 */
	public function sections()
	{
		return $this->belongsToMany(Section::class)
			->withPivot('id')
			->withTimestamps();
	}

	public function questionsDepended()
	{
		return $this->belongsTo(Question::class, 'dependent_question_id');
	}

}
