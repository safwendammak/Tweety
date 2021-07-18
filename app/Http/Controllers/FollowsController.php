<?php

namespace App\Http\Controllers;

use App\User;

class FollowsController extends Controller
{
    public function store(User $user)
    {
        auth()->user()->follows()->toggle($user);
        return back();
    }
}
