<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TripStarted extends Notification
{
    use Queueable;
    private $newTrip;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($newTrip)
    {
        $this->newTrip = $newTrip;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
//     public function toMail($notifiable)
//     {
//         // return (new MailMessage)
//         //             ->line('The introduction to the notification.')
//         //             ->action('Notification Action', url('/'))
//         //             ->line('Thank you for using our application!');

//         return (new MailMessage)                    
//             ->line($this->newTrip['name'])
//             ->line($this->newTrip['body'])
//             ->action($this->newTrip['tripText'], $this->newTrip['tripUrl'])
//             ->line($this->newTrip['thanks']);
    
//  }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        
    }

    public function toDatabase($notifiable){
        return [
            'trip_id' => 1,
            'body'=> 'Departure from the school',
            'action' => 'Track their whereabouts now!!!'
        ];

    }
}
