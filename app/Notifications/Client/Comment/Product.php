<?php

namespace App\Notifications\Client\Comment;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Product extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                ->subject(config('app.name').' tienes un nuevo comentario web')
                ->greeting('Hola '.config('app.name'))
                ->line($this->comment->name.' ha comentado un producto')
                ->action('Gestionar comentario', route('admin.comment.show', $this->comment))
                ->line($this->comment->body);
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
            'name' => $this->comment->name,
            'user_id' => $this->comment->user_id,
            'email' => $this->comment->email,
            'stars' => $this->comment->stars,
            'body' => $this->comment->body,
            'url' => route('admin.comment.show', $this->comment),
        ];
    }
}
