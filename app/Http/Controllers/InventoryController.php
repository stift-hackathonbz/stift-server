<?php

namespace App\Http\Controllers;

use App\Tool;

class InventoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TODO: Check for user
        $tools = Tool::with(['lastPlace', 'currentPlace'])
            ->orderBy('current_place_updated_at', 'desc')
            ->limit(20)
            ->get();

        return view('inventory', ['tools' => $tools]);
    }
}
