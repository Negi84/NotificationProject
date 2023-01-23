<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\WelcomeNotification;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
    //

    public function index()
    {
        $users = User::all();

        $post = [
            'title' => 'post title',
            'slug' => 'post slug',
        ];

        foreach ($users as $user) {
            // Notification::send($user, new WelcomeNotification($post));
            $user->notify(new WelcomeNotification($post));
        }
        // return view('welcome');
        dd('done');
    }
}
