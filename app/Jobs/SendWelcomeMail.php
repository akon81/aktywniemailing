<?php

namespace App\Jobs;

use App\Mail\WelcomeMail;
use App\Models\Subscriber;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendWelcomeMail implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public readonly Subscriber $subscriber
    ) {}

    public function handle(): void
    {
        Mail::to($this->subscriber->email)->send(new WelcomeMail($this->subscriber));
    }
}
