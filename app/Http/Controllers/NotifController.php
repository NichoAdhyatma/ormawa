<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NotifMhs;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use Inertia\Inertia;

class NotifController extends Controller
{

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->get();

        return Inertia::render('Dashboard/Notif', [
            'user' => $user[0]->notifications,
        ]);
    }

    public static function notify($organisasi, $user, $msg)
    {
        $user = User::where('id', $user)->get();
        Notification::send($user[0], new NotifMhs($user[0], $organisasi[0], $msg));
    }
}
