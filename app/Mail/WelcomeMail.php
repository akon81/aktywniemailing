<?php

namespace App\Mail;

use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly Subscriber $subscriber
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(subject: __('email.welcome_subject'));
    }

    public function content(): Content
    {
        return new Content(view: 'emails.welcome');
    }
}
