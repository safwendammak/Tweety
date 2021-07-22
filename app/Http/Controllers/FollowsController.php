<?php

namespace App\Http\Controllers;

use App\User;
use RealRashid\SweetAlert\Facades\Alert;

class FollowsController extends Controller
{
    public function store(User $user)
    {
        auth()->user()->follows()->toggle($user);
        if (auth()->user()->following($user)) {
            Alert::toast('You have been followed ' . auth()->user()->name, 'success');
        } else {
            Alert::toast('You have been unfollowed ' . auth()->user()->name, 'success');
        }
        return back();
    }
}
