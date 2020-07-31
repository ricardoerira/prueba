<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Question\Question;

class Header extends Model
{
    protected $fillable = [
        "name",
        "slug",
        "instructions",
        "other_header_info",
        "organization_id"
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class,'header_section')
            ->withTimestamps()
            ->withPivot('priority');
    }

}
