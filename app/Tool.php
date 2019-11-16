<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tool extends Model
{
    public function lastPlace()
    {
        return $this->belongsTo(Place::class, 'last_place_id');
    }

    public function currentPlace()
    {
        return $this->belongsTo(Place::class, 'current_place_id');
    }

    public function toArray()
    {
        $data = parent::toArray();

        // TODO: remove ugly hack
        $data['available'] = $this->currentPlace->type !== 'unknown';
        if (Str::contains(request()->path(), 'checklist')) {
            // TODO: get correct checklist
            $data['available'] = $this->currentPlace->type === 'car';
        }

        $data['current_place_updated_at'] = $data['current_place_updated_at'] ? Carbon::parse($data['current_place_updated_at'])->diffForHumans() : null;
        $data['last_place_updated_at'] = $data['last_place_updated_at'] ? Carbon::parse($data['last_place_updated_at'])->diffForHumans() : null;

        return $data;
    }
}
