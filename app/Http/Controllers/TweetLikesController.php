<?php

namespace App\Http\Controllers;

use App\Tweet;

class TweetLikesController extends Controller
{
    public function storeLike(Tweet $tweet)
    {
        $tweet->like(current_user());
        return back();
    }

    public function storeDisLike(Tweet $tweet)
    {
        $tweet->dislike(current_user());
        return back();
    }

    public function destroyLike(Tweet $tweet)
    {
        $tweet->unlike(current_user());
        return back();
    }

    public function destroyDisLike(Tweet $tweet)
    {
        $tweet->unlike(current_user());
        return back();
    }
}
