<?php

namespace App\Http\Controllers\API;

use App\Checklist;
use App\Http\Controllers\Controller;

class ChecklistController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function show()
    {
        // TODO: Check for user
        $checklist = Checklist::with(['tools', 'tools.lastPlace', 'tools.currentPlace'])->first();

        return response($checklist);
    }
}
