<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    public function tools()
    {
        return $this->belongsToMany(Tool::class)
            ->orderBy('current_place_updated_at', 'desc');
    }
}
