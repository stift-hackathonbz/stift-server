<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Place;
use App\Tool;
use Carbon\Carbon;

class RfidController extends Controller
{
    /**
     * @param $rfid
     * @return \Illuminate\Http\Response
     */
    public function store($rfid)
    {
        //TODO: check transporter - for this test we use always car
        $placeType = 'car';
        $car = Place::where('type', '=', $placeType)->firstOrFail();
        $tool = Tool::where('rfid', '=', $rfid)->firstOrFail();

        if ($tool->current_place_id === $car->id) {
            $unknown = Place::where('type', '=', 'unknown')->firstOrFail();

            $tool->last_place_id = $car->id;
            $tool->last_place_updated_at = $tool->current_place_updated_at;
            $tool->current_place_id = $unknown->id;
            $tool->current_place_updated_at = Carbon::now();
        } else {
            $tool->last_place_id = $car->id;
            $tool->last_place_updated_at = $tool->current_place_updated_at;
            $tool->current_place_id = $car->id;
            $tool->current_place_updated_at = Carbon::now();
        }
        $tool->save();

        return response()->noContent();
    }
}
