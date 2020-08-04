<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Section
 *
 * @property int $id
 * @property int|null $header_id
 * @property string|null $name
 * @property string|null $title
 * @property string|null $subheading
 * @property bool $required_yn
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Header $header
 * @property Collection|Question[] $questions
 * @property Collection|SectionUser[] $section_users
 *
 * @package App\Models
 */
class Section extends Model
{
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'title',
        'subheading',
        'required_yn'
    ];

    /**
     * headers
     *
     * @return void
     */
    public function headers()
    {
        return $this->belongsToMany(Header::class, 'header_section')
            ->withTimestamps()
            ->withPivot('priority');;
    }

    /**
     * questions
     *
     * @return void
     */
    public function questions()
    {
        return $this->belongsToMany(Question::class)->withTimestamps();
    }

}
