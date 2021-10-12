<?php

namespace App\Mail\Client;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Comment extends Mailable
{
    use Queueable, SerializesModels;

    public $model;
    public $comment;

    public function __construct($model, $comment)
    {
        $this->model = $model;
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nuevo comentario')->view('client.emails.comment');
    }
}
