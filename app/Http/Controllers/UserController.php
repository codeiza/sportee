<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function showProfile()
    {
        $user = Auth::user();

        // Retrieve only the events associated with the logged-in user
        $events = Event::where('user_id', $user->id)->get();

        return view('user.user_profile', compact('user', 'events'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'userFname' => 'string|max:255',
            'userLname' => 'string|max:255',
            'userContact' => 'string|max:11',
            'userEmail' => 'unique:users,email,' . $request->user_id,
            'password' => 'nullable|string|min:6',
        ]);

        $user = User::findOrFail($request->user_id);

        $user->fname = $request->input('userFname');
        $user->lname = $request->input('userLname');
        $user->contact = $request->input('userContact');
        $user->email = $request->input('userEmail');

        // Check if a new password is provided and not empty
        if ($request->filled('password')) {
            // Hash the new password
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect()->route('show.profile')->with('success', 'User updated successfully!');
    }
}
