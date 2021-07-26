<?php

namespace App\Http\Controllers;

use App\Notifications\FollowNotification;
use App\Notifications\TweetCreated;
use App\User;
use Illuminate\Support\Facades\Notification;
use RealRashid\SweetAlert\Facades\Alert;

class FollowsController extends Controller
{
    public function store(User $user)
    {
        auth()->user()->follows()->toggle($user);
        if (auth()->user()->following($user)) {
            Alert::toast('You have been followed ' . auth()->user()->name, 'success');
            Notification::send($user, new FollowNotification(current_user()));
        } else {
            Alert::toast('You have been unfollowed ' . auth()->user()->name, 'success');
        }
        return back();
    }
}
