<?php

namespace App\Listeners;

use App\Events\NotifyToUserNotificationsStored;
use App\Notifications\InviteProjectNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendInviteProjectListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $user    = $event->data['user'];
        $project = $event->data['project'];
        $role    = $event->data['role'];

        Notification::send($user, new InviteProjectNotification($project, $role));

        event(new NotifyToUserNotificationsStored([
            'userId'           => $user->id,
            'getNotifications' => true,
            'message'          => 'You have new notification'
        ]));
    }
}
