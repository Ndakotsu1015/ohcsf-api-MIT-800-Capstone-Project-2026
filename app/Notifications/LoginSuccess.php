<?php

namespace App\Notifications;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoginSuccess extends Notification implements ShouldQueue
{
    use Queueable;
    protected $recepient;

    /**
     * Create a new notification instance.
     */
    public function __construct(User $recepient)
    {
        $this->recepient = $recepient;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Login Notification for OHCSF Portal')
            ->greeting('Hello ' . $this->recepient->name . '!')
            ->line('We wanted to inform you that a login has been initiated for your OHCSF account.')
            ->line("If this was you, no action is needed. However, if you didn't log in recently, please contact our support team immediately at [info@ohcsf.gov.ng].")
            ->line("Your account security is our top priority.");
        // ->line('You have successfully logged in to the OHCSF Portal @ ' . Carbon::now());
    }

    /**
     * Get the database representation of the notification.
     */
    public function toDatabase(object $notifiable): DatabaseMessage
    {
        return new DatabaseMessage([
            'subject' => 'Login Successful',
            'content' => 'You have successfully logged in to our application.',
            'user_id' => $notifiable->id,
            'type' => 'success_login',
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
