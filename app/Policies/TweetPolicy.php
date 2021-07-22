<?php

namespace App\Policies;

use App\Tweet;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TweetPolicy
{
    use HandlesAuthorization;

    public function destroy(User $currentUser, Tweet $tweet)
    {
        return $tweet->user_id == $currentUser->id;
    }
}
