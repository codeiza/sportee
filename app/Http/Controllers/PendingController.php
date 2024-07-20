<?php

namespace App\Http\Controllers;
use App\Models\Event;

use Illuminate\Http\Request;

class PendingController extends Controller
{
    public function show(){
        
        $getpendingEvents = Event::all();
        $eventModel = new Event();
        $pendingEvent = Event::where('status', 'pending')->get();

        return view('admin.pending', compact('getpendingEvents', 'pendingEvent', 'eventModel'));
    }
}
