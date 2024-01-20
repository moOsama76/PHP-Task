<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;

    public function __construct()
    {
    }
    public function build()
    {
        return $this->from('admin@myapp.com', 'Admin')
                    ->subject('Welcome')
                    ->view('emails.welcomeemail');
    }
}
