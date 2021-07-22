<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TweetsController extends Controller
{
    public function index()
    {
        return view('tweets.index', [
            'tweets' => auth()->user()->timeline()
        ]);
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'body' => 'required|max:255'
        ]);
        $attributes['user_id'] = auth()->id();
        if (request('file')) {
           // $image = request('file');

            //$imageName = time() . '.' . $image->extension();
           // $image->move(public_path('images'), $imageName);
            $attributes['image'] = request('file')->store('tweets');
        }
        Tweet::create($attributes);
        return ['urllink' => route('home')];
    }
}
