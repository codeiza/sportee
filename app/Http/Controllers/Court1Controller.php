<?php

namespace App\Http\Controllers;

use App\Models\Event;

use Illuminate\Http\Request;

class Court1Controller extends Controller
{
    public function show()
    {
        // Count events with title 'court-1'
        $court1EventCount = Event::where('title', 'court-1')->count();

        // Count events with title 'court-2'
        $court2EventCount = Event::where('title', 'court-2')->count();

        // Count events with title 'court-3'
        $court3EventCount = Event::where('title', 'court-3')->count();

        return view('admin.court1', compact('court1EventCount', 'court2EventCount', 'court3EventCount'));
    }
}
