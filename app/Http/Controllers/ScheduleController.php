<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class ScheduleController extends Controller
{
    //
    public function showIndex($court = null)
    {
        $query = Event::query();

        if ($court) {
            $query->where('title', $court);
        }

        $events = $query->orderBy('created_at', 'desc')->paginate(9);

        return view('schedules.court_schedules', compact('events'));
    }
}
