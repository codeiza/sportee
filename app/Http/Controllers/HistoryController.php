<?php

namespace App\Http\Controllers;
use App\Models\Event;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function show(){
        $events = Event::all();
        $getEventDone = Event::all();
        $eventModel = new Event();
        $doneEvent = Event::where('status', 'done')->get();

        return view('admin.history', compact('events','getEventDone', 'doneEvent', 'eventModel'));
    }
}
