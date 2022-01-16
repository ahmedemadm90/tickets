<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewTicket extends Notification
{
    use Queueable;
    private $ticket_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($ticket_id)
    {
        $this->ticket_id = $ticket_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = 'http://8c1d-197-39-165-59.ngrok.io/tickets/show/'. $this->ticket_id;
        return (new MailMessage)
            ->subject('New Ticket || '.$this->ticket_id)
            ->line('New Ticket || '.$this->ticket_id)
            ->action('Show Ticket Details', $url)
            ->line('Thank you for using our application!');
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
