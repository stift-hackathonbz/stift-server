<?php

namespace App\Http\Controllers;

use App\Checklist;

class ChecklistController extends Controller
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
        $checklist = Checklist::with(['tools', 'tools.lastPlace', 'tools.currentPlace'])
            ->first();

        return view('checklist', ['checklist' => $checklist]);
    }
}
