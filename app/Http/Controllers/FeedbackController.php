<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function showFeedbacks(){

        $feed = Feedback::all();

        return view('admin.feedback', compact('feed'));
    }
}
