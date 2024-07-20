<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class AdminController extends Controller
{
    //
    public function showProfile()
    {
        $events = Event::all();
        // Retrieve only the events associated with the logged-in user

        return view('admin.history', compact('events'));
    }

    public function showUserList()
    {
        $users = User::all();

        return view('admin.user', compact('users'));
    }
}
