<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QueueMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $queue_data;

    public function __construct($queue_data)
    {
        $this->queue_data = $queue_data;
    }


    public function envelope()
    {
        return new Envelope(
            subject: 'Queue Mail',
        );
    }


    public function content()
    {
        return new Content(
            view: 'mails.queue',
            with: [
                'name'=>$this->queue_data['name'],
                'email'=>$this->queue_data['email']
            ],
        );
    }


    public function attachments()
    {
        return [];
    }
}