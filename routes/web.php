<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('splash');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/index', [App\Http\Controllers\EventController::class, 'index'])->name('index');
    Route::get('/userlist', [App\Http\Controllers\AdminController::class, 'showUserList'])->name('admin.user.list');


    Route::get('/event', function () {
        return view('admin.event');
    });

    Route::get('/history', function () {
        return view('admin.history');
    });

    Route::get('/user', function () {
        return view('admin.user');
    });

    Route::get('/getevent', [App\Http\Controllers\EventController::class, 'getEvent'])->name('getevent');
    Route::get('/show/{id}', [EventController::class, 'show']);

    Route::get('/events/{id}/edit', [EventController::class, 'edit']);
    Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('admin.destroy');
    Route::patch('/events/{id}', [EventController::class, 'update']);
    Route::get('/events/{id}/done', [EventController::class, 'markAsDone']);

    Route::post('/events', [EventController::class, 'store'])->name('admin.store');
    Route::get('/events/create', [EventController::class, 'create'])->name('admin.create');
    Route::patch('events/{id}', [App\Http\Controllers\EventController::class, 'done'])->name('admin.done');

    Route::get('/users', [EventController::class, 'searchUsers'])->name('admin.searchUsers');
    Route::get('viewUser/{userId}', [EventController::class, 'viewUserProfile'])->name('admin.viewUserProfile');

    Route::get('/events/create/{user}', [EventController::class, 'createForUser'])->name('admin.events.create');
    Route::post('/events/store/{user}', [EventController::class, 'storeForUser'])->name('admin.events.store');

    Route::get('/graph', [EventController::class, 'statusCounter'])->name('graph');
});

Auth::routes();

Route::middleware(['web'])->group(function () {
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/feedback',  [App\Http\Controllers\EventController::class, 'storeFeedback']);
    Route::get('/feedback', [FeedbackController::class, 'showFeedbacks']);

    Route::get('/reservation', [App\Http\Controllers\EventController::class, 'userReservation'])->name('userReservation');
    Route::get('/getevent', [App\Http\Controllers\EventController::class, 'getEvent'])->name('getevent');
    //Profile
    Route::get('/profile', [UserController::class, 'showProfile'])->name('show.profile');
    Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('profile.update');

    Route::post('/events', [EventController::class, 'userReservationstore'])->name('user.store');
    Route::get('/usercalendar', [App\Http\Controllers\EventController::class, 'userCalendar'])->name('usercalendar');
});

Route::get('/court-schedules', [ScheduleController::class, 'showIndex'])->name('show.schedule');
Route::get('/court-schedules/{court?}', [ScheduleController::class, 'showIndex'])->name('court-schedules.index');

Route::get('/history', [App\Http\Controllers\HistoryController::class, 'show']);
Route::get('/send/{id}', [App\Http\Controllers\MailController::class, 'sendEmailNotification']);
