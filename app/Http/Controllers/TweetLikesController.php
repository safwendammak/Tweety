<?php

namespace App\Http\Controllers;

use App\Notifications\LikeNotification;
use App\Tweet;
use App\User;
use Illuminate\Support\Facades\Notification;

class TweetLikesController extends Controller
{
    public function storeLike(Tweet $tweet)
    {
        $tweet->like(current_user());
        $tweetOwner = User::find($tweet->user_id);
        Notification::send($tweetOwner, new LikeNotification($tweet->fresh(), current_user(), 'Liked'));
        return back();
    }

    public function storeDisLike(Tweet $tweet)
    {
        $tweet->dislike(current_user());
        $tweetOwner = User::find($tweet->user_id);
        Notification::send($tweetOwner, new LikeNotification($tweet->fresh(), current_user(), 'Disliked'));
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
