<?php

namespace App\Http\Controllers;

use App\Tweet;
use RealRashid\SweetAlert\Facades\Alert;

class TweetsController extends Controller
{
    public function index()
    {

        return view('tweets.index', [
            'tweets' => auth()->user()->timeline()
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'body' => 'required|max:255'
        ]);
        $attributes['user_id'] = auth()->id();
        $redirect = redirect()->route('home');
        if (request('file')) {
            $attributes['image'] = request('file')->store('tweets');
            $redirect = ['urllink' => route('home')];
        }
        Tweet::create($attributes);
        Alert::toast('Tweet Added', 'success');
        redirect()->route('home');
        return $redirect;
    }

    public function destroy(Tweet $tweet)
    {
        $this->authorize('destroy', $tweet);
        $tweet->delete();
        Alert::toast('Tweet Deleted', 'success');
        return back();
    }
}
