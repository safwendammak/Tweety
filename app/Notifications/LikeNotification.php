<?php

namespace App\Notifications;

use App\Tweet;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class LikeNotification extends Notification
{
    use Queueable;

    /**
     * @var Tweet
     */
    private $tweet;
    private $user;
    private $like;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Tweet $tweet, $user, $like)
    {
        $this->tweet = $tweet;
        $this->user = $user;
        $this->like = $like;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'tweet' => $this->tweet,
            'user' => $this->user,
            'like' => $this->like,
        ];
    }
}
