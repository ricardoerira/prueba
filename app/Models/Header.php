<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        "name",
        "slug",
        "instructions",
        "other_header_info",
        "organization_id"
    ];

    /**
     * organization
     *
     * @return void
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    /**
     * sections
     *
     * @return void
     */
    public function sections()
    {
        return $this->belongsToMany(Section::class)
            ->withTimestamps()
            ->withPivot('priority')
            ->orderBy('priority', 'asc');
    }

    /**
     * surveys
     *
     * @return void
     */
    public function surveys()
    {
        if ($this->id == 3) {
            return $this->hasMany(Survey::class)
                ->where('surveyed_id', Auth::id())
                ->whereDate('surveys.completion_time', Carbon::now()->format('Y-m-d'));
        } else {
            return $this->hasMany(Survey::class)
                ->where('surveyed_id', Auth::id());
        }

    }

}
