<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Feedback;
use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;

class EventController extends Controller
{
    public function getEvent()
    {
        $user = Auth::user();
        $events = array();
        $bookings = Event::all();
        foreach ($bookings as $booking) {
            $events[] = [
                // 'user_id' => $booking->user_id,
                'title' => $booking->title,
                // 'fname' => $booking->fname,
                // 'lname' => $booking->lname,
                // 'contact' => $booking->contact,
                // 'email' => $booking->email,
                'start' => $booking->start_date,
                'end' => $booking->end_date,
                'rent_fee' => $booking->rent_fee,
                // 'status' => $booking->status,
            ];
        }
        // return dd($events);

        return view(
            'admin.event',
            compact('events', 'user')
        );
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        //     $startDateTime = \Carbon\Carbon::parse($request->input('start'));
        //     $endDateTime = \Carbon\Carbon::parse($request->input('end'));

        //     $request->validate([
        //         'start' => [
        //             'required',
        //             Rule::unique('events', 'start')
        //                 ->where(function ($query) use ($request) {
        //                     $start = \Carbon\Carbon::parse($request->input('start'))->format('Y-m-d H:i');
        //                     $end = \Carbon\Carbon::parse($request->input('end'))->format('Y-m-d H:i');

        //                     return $query->where('end', '>', $start)
        //                         ->where('start', '<', $end);
        //                 }),
        //         ],
        //     ], [
        //         'start.unique' =>  $startDateTime->format('h:i A') . ' to ' . $endDateTime->format('h:i A') . ' has already been taken.',
        //     ]);
        //     $event = new Event;
        //     $event->title = $request->title;
        //     $event->fname = $request->fname;
        //     $event->lname = $request->lname;
        //     $event->contact = $request->contact;
        //     $event->email = $request->email;
        //     $event->start = $startDateTime->toDateTimeString();
        //     $event->end = $endDateTime->toDateTimeString();

        //     $eventSaved = $event->save();

        //     if ($eventSaved) {
        //         // Redirect with success message
        //         return redirect('/admin/getevent')->with('success', 'Event created successfully.');
        //     } else {
        //         // Redirect with error message
        //         return redirect('/admin/getevent')->with('error', 'Oops! Something went wrong.');
        //     }
        // }
        // Define the validation rules
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'userContact' => 'required|string|max:255',
            'userEmail' => 'required|email|max:255',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
            'rentFee' => 'required|numeric',
        ], [
            'title.max' => 'The :attribute field must not exceed 255 characters.',
            'fname.max' => 'The :attribute field must not exceed 255 characters.',
            'lname.max' => 'The :attribute field must not exceed 255 characters.',
            'userContact.max' => 'The :attribute field must not exceed 255 characters.',
            'userEmail.email' => 'The :attribute must be a valid email address.',
            'endDate.after_or_equal' => 'The :attribute must be after or equal to the Start Date.',
        ]);

        // Run the validation
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Check for uniqueness
        $existingEvent = Event::where('title', $request->title)
            ->where('start_date', $request->startDate)
            ->where('end_date', $request->endDate)
            ->when($request->has('event_id'), function ($query) use ($request) {
                $query->where('id', '!=', $request->event_id);
            })
            ->first();

        if ($existingEvent) {
            // Check if the existing event has the same user_id
            if ($existingEvent->user_id == $request->user_id) {
                // If the existing event has the same user_id, it's a duplicate for the same user
                return redirect()->back()->withErrors(['unique' => 'The combination of Title, Start Date, and End Date has already been taken.'])->withInput();
            } else {
                // If the existing event has a different user_id, it's a duplicate for a different user
                return redirect()->back()->withErrors(['unique' => 'The combination of Title, Start Date, and End Date has already been taken by another user.'])->withInput();
            }
        }

        // If validation passes and no duplicate entry found, proceed with saving the event
        $event = new Event;
        $event->user_id = $request->user_id;
        $event->title = $request->title;
        $event->fname = $request->fname;
        $event->lname = $request->lname;
        $event->contact = $request->userContact;
        $event->email = $request->userEmail;
        $event->start_date = $request->startDate;
        $event->end_date = $request->endDate;
        $event->rent_fee = $request->rentFee;
        $event->status = "pending";
        $eventSaved = $event->save();

        // Redirect with success message if event saved successfully
        // Check if event was not saved due to uniqueness constraint
        if (!$eventSaved && $existingEvent) {
            return redirect()->back()->withErrors(['unique' => 'The combination of Title, Start Date, and End Date has already been taken.'])->withInput();
        }

        // Check if event was not saved for other reasons
        if (!$eventSaved) {
            return redirect()->back()->withErrors(['generic' => 'Event could not be saved.'])->withInput();
        }

        // Redirect with success message if event saved successfully
        return redirect('/admin/events/create')->with(
            'success',
            'Event created successfully.'
        );
    }

    public function index()
    {

        // Fetch all events
        $events = Event::all();

        // Instantiate Event model
        $eventModel = new Event();

        // Count pending events
        $pendingEventCount = $eventModel->getpendingEvents();

        // Count done events
        $doneEventCount = $eventModel->getdoneEvent();

        // Count events with title 'court-1'
        $court1EventCount = Event::where('title', 'court-1')->count();

        // Count events with title 'court-2'
        $court2EventCount = Event::where('title', 'court-2')->count();

        // Count events with title 'court-3'
        $court3EventCount = Event::where('title', 'court-3')->count();

        // Query to get status counts
        $result = DB::select(DB::raw("
        SELECT status, COUNT(*) AS count
        FROM events
        GROUP BY status
    "));

        // Process data for the chart
        $chartData = "";
        foreach ($result as $list) {
            $chartData .= "['" . $list->status . "', " . $list->count . "],";
        }

        return view('admin.adminIndex', compact('chartData', 'events', 'pendingEventCount', 'doneEventCount', 'court1EventCount', 'court2EventCount', 'court3EventCount'));
    }



    // FOR CHANGING STATUS

    public function done($id)
    {

        $event = Event::find($id);
        $event->status = 'done';
        $event->save();

        $event->touch();

        return redirect('/admin/index');
    }


    public function show($id)
    {
        $event = Event::find($id);

        return view('admin.show', compact('event'));
    }


    public function edit($id)
    {
        $event = Event::find($id);

        return view('admin.edit', compact('event'));
    }


    public function update(Request $request, $id)
    {
        // dd($request);
        $event = Event::find($id);
        $event->id = $request->id;
        $event->title = $request->title;
        $event->fname = $request->fname;
        $event->lname = $request->lname;
        $event->contact = $request->contact;
        $event->email = $request->email;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->save();

        return redirect('/admin/index');
    }


    // feedback method 
    public function storeFeedback(Request $request)
    {
        $feedback = new Feedback;
        $feedback->name = $request->input('feedback_name');
        $feedback->email = $request->input('feedback_email');
        $feedback->feed = $request->input('feedback_feed');
        $feedback->save();

        return redirect('/home')->with('success', 'Feedback submitted successfully!');
    }




    // showing index of calendar for user

    public function userReservation()
    {
        $user = Auth::user();
        $events = array();
        $bookings = Event::all();
        foreach ($bookings as $booking) {
            $events[] = [
                // 'user_id' => $booking->user_id,
                'title' => $booking->title,
                // 'fname' => $booking->fname,
                // 'lname' => $booking->lname,
                // 'contact' => $booking->contact,
                // 'email' => $booking->email,
                'start' => $booking->start_date,
                'end' => $booking->end_date,
                'rent_fee' => $booking->rent_fee,
                // 'status' => $booking->status,
            ];
        }
        // return dd($events);

        return view(
            'user.reservation',
            compact('events', 'user')
        );
    }

    public function userReservationstore(Request $request)
    {
        // Define the validation rules
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'userContact' => 'required|string|max:255',
            'userEmail' => 'required|email|max:255',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
            'rentFee' => 'required|numeric',
        ], [
            'title.max' => 'The :attribute field must not exceed 255 characters.',
            'fname.max' => 'The :attribute field must not exceed 255 characters.',
            'lname.max' => 'The :attribute field must not exceed 255 characters.',
            'userContact.max' => 'The :attribute field must not exceed 255 characters.',
            'userEmail.email' => 'The :attribute must be a valid email address.',
            'endDate.after_or_equal' => 'The :attribute must be after or equal to the Start Date.',
        ]);

        // Run the validation
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Check for uniqueness
        $existingEvent = Event::where('title', $request->title)
            ->where('start_date', $request->startDate)
            ->where('end_date', $request->endDate)
            ->when($request->has('event_id'), function ($query) use ($request) {
                $query->where('id', '!=', $request->event_id);
            })
            ->first();

        if ($existingEvent) {
            // Check if the existing event has the same user_id
            if ($existingEvent->user_id == $request->user_id) {
                // If the existing event has the same user_id, it's a duplicate for the same user
                return redirect()->back()->withErrors(['unique' => 'The combination of Title, Start Date, and End Date has already been taken.'])->withInput();
            } else {
                // If the existing event has a different user_id, it's a duplicate for a different user
                return redirect()->back()->withErrors(['unique' => 'The combination of Title, Start Date, and End Date has already been taken by another user.'])->withInput();
            }
        }

        // If validation passes and no duplicate entry found, proceed with saving the event
        $event = new Event;
        $event->user_id = $request->user_id;
        $event->title = $request->title;
        $event->fname = $request->fname;
        $event->lname = $request->lname;
        $event->contact = $request->userContact;
        $event->email = $request->userEmail;
        $event->start_date = $request->startDate;
        $event->end_date = $request->endDate;
        $event->rent_fee = $request->rentFee;
        $event->status = "pending";
        $eventSaved = $event->save();

        // Redirect with success message if event saved successfully
        // Check if event was not saved due to uniqueness constraint
        if (!$eventSaved && $existingEvent) {
            return redirect()->back()->withErrors(['unique' => 'The combination of Title, Start Date, and End Date has already been taken.'])->withInput();
        }

        // Check if event was not saved for other reasons
        if (!$eventSaved) {
            return redirect()->back()->withErrors(['generic' => 'Event could not be saved.'])->withInput();
        }

        // Redirect with success message if event saved successfully
        return redirect('/reservation')->with(
            'success',
            'Event created successfully.'
        );
    }


    public function destroy($id)
    {
        $event = Event::find($id);

        $event->delete();
        return redirect('/admin/index');
    }


    // search user profile 

    public function showAdminPanel()
    {
        $users = User::all();
        $events = Event::all();

        return view('admin.adminIndex', compact('users', 'events'));
    }

    public function searchUsers(Request $request)
    {
        $events = Event::all();
        $eventModel = new Event();
        $pendingEventCount = $eventModel->getpendingEvents();

        $eventModel = new Event();
        $doneEventCount = $eventModel->getdoneEvent();

        $eventModel = new Event();
        $court1EventCount = $eventModel->getCourt1Event();

        $eventModel = new Event();
        $court2EventCount = $eventModel->getCourt2Event();

        $eventModel = new Event();
        $court3EventCount = $eventModel->getCourt3Event();




        $keyword = $request->input('search');
        if (is_numeric($keyword)) {
            // If numeric, search by user ID
            $users = User::where('id', $keyword)->get();
        } else {
            // If not numeric, search by name
            $users = User::where('fname', 'like', '%' . $keyword . '%')
                ->orWhere('email', 'like', '%' . $keyword . '%')->get();
        }


        $result = DB::select(DB::raw("
            SELECT status, COUNT(*) AS count
            FROM events
            GROUP BY status
        "));

        $chartData = "";

        foreach ($result as $list) {
            $chartData .= "['" . $list->status . "', " . $list->count . "],";
        }

        // return view('admin.adminIndex', compact('keyword', 'events' , 'users', 'pendingEventCount', 'doneEventCount', 'court1EventCount', 'court2EventCount', 'court3EventCount'));
        return view('admin.adminIndex', ['chartData' => $chartData, 'users' => $users, 'searchKeyword' => $keyword, 'events' => $events, 'pendingEventCount' => $pendingEventCount, 'doneEventCount' => $doneEventCount, 'court1EventCount' => $court1EventCount, 'court2EventCount' => $court2EventCount, 'court3EventCount' => $court3EventCount]);
    }

    public function viewUserProfile($userId)
    {
        $user = User::find($userId);

        return view('admin.user', ['user' => $user]);
    }

    public function createForUser(User $user)
    {
        return view('admin.userReservation', compact('user'));
    }

    public function storeForUser(Request $request, User $user)
    {
        $startDateTime = \Carbon\Carbon::parse($request->input('start'));
        $endDateTime = \Carbon\Carbon::parse($request->input('end'));

        $request->validate([
            'start' => [
                'required',
                Rule::unique('events', 'start')
                    ->where(function ($query) use ($request) {
                        $start = \Carbon\Carbon::parse($request->input('start'))->format('Y-m-d H:i');
                        $end = \Carbon\Carbon::parse($request->input('end'))->format('Y-m-d H:i');

                        return $query->where('end', '>', $start)
                            ->where('start', '<', $end);
                    }),
            ],
        ], [
            'start.unique' =>  $startDateTime->format('h:i A') . ' to ' . $endDateTime->format('h:i A') . ' has already been taken.',
        ]);

        $eventData = [
            'title' => $request->title,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->phone,
            'user_id' => $user->id, // Use the pulled user's ID
            'start' => $startDateTime->toDateTimeString(),
            'end' => $endDateTime->toDateTimeString(),
        ];

        $event = Event::create($eventData);

        if ($event) {
            // Redirect with success message
            return redirect('/admin/getevent')->with('success', 'Event created successfully.');
        } else {
            // Redirect with error message
            return redirect('/admin/getevent')->with('error', 'Oops! Something went wrong.');
        }
    }



    public function userCalendar()
    {
        return view('user.usercalendar');
    }





    public function statusCounter()
    {
        // $eventStatus = Event::all();
        // $eventCount = Event::getStatusCount();
        // $eventStatusCounts = Event::countByStatus();

        $result = DB::select(DB::raw("
            SELECT status, COUNT(*) AS count
            FROM events
            GROUP BY status
        "));

        $chartData = "";

        foreach ($result as $list) {
            $chartData .= "['" . $list->status . "', " . $list->count . "],";
        }

        return view('admin.graph', compact('chartData'));
    }
}
