<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo('App\Models\organization');
    }

}
