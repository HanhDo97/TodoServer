<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InviteProjectNotification extends Notification
{
    use Queueable;

    public $project;
    public $role;
    /**
     * Create a new notification instance.
     */
    public function __construct($project, $role)
    {
        $this->project = $project;
        $this->role    = $role;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        // return ['mail'];
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $projectTitle = $this->project->title;
        $role         = $this->role;
        return (new MailMessage)
            ->line("You have invited to join $projectTitle as a $role.")
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(User $user): array
    {
        $userFrom = auth()->guard('sanctum')->user();
        $userTo   = $user;
        $message  = "You have received an inviting to join a board";
        return [
            'userFrom' => $userFrom,
            'userTo'   => $userTo,
            'project'  => $this->project,
            'role'     => $this->role,
            'message'  => $message
        ];
    }
}
