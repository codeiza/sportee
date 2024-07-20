<?php

namespace App\Http\Controllers;

use App\Models\User;  // Import User model
use Illuminate\Support\Facades\Mail;  // Import Mail facade
use App\Mail\MailNotify;
use Illuminate\Http\Request;

class MailController extends Controller
{
    // public function indexEmail(){
    //     $data = [
    //         'subject'=>'Appointment Reminder',
    //         'body'=> 'Quick heads-up! We would like to remind you of your Court Reservation'
    //     ];
    //     try {
    //         Mail::to('dejesusbrndth@gmail.com')->send(new MailNotify($data));
    //         return response()->json(['Notification Sent Check Your Mailbox']);
    //     } catch (Exception $th) {
    //         return response()->json(['Something Went Wrong :(']);
    //     }
    // }

    public function sendEmailNotification($id)
    {
        $user = User::find($id);



        if ($user) {
            
        $data = [
            'subject'=>'Appointment Reminder',
            'body'=> 'Quick heads-up! We would like to remind you of your Court Reservation'
        ];
            $userEmail = $user->email;
            Mail::to($userEmail)->send(new MailNotify($data));  // Using facade without importing globally
            return response()->json(['Notification Sent to ' . $userEmail]);
        } else {
            return response()->json(['User not found'], 404);
        }
    }
}
