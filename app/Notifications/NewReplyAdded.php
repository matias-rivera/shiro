<?php

namespace App\Notifications;

use App\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewReplyAdded extends Notification
{
    use Queueable;

    public $reply;
    public $comment;
  

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Comment $reply)
    {
        //Reply data
        $this->reply = $reply;
        $this->reply->user = $reply->user;
        $this->reply->post->server = $reply->post->server;

        //Comment data
        $this->comment = Comment::find($this->reply->parent);
        $this->comment->user = $this->comment->user;
        

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
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
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
            'reply' => $this->reply,
            'comment' => $this->comment
            //
        ];
    }

   
}
