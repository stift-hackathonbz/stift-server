<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Tool;

class ToolController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index()
    {
        // TODO: Check for user
        $tools = Tool::with(['lastPlace', 'currentPlace'])
            ->orderBy('current_place_updated_at', 'desc')
            ->limit(20)
            ->get();

        return response($tools);
    }
}
