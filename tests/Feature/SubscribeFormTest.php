<?php

use App\Jobs\SendWelcomeMail;
use App\Livewire\SubscribeForm;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Queue;
use Livewire\Livewire;

it('dispatches SendWelcomeMail job on new subscription', function () {
    Queue::fake();

    Livewire::test(SubscribeForm::class)
        ->set('name', 'Jan Kowalski')
        ->set('email', 'jan@example.com')
        ->call('submit');

    Queue::assertPushed(SendWelcomeMail::class, function ($job) {
        return $job->subscriber->email === 'jan@example.com';
    });
});

it('creates subscriber and marks as confirmed', function () {
    Queue::fake();

    Livewire::test(SubscribeForm::class)
        ->set('name', 'Jan Kowalski')
        ->set('email', 'jan@example.com')
        ->call('submit');

    expect(Subscriber::where('email', 'jan@example.com')->first())
        ->not->toBeNull()
        ->status->toBe('confirmed');
});

it('sets submitted to true after successful subscription', function () {
    Queue::fake();

    Livewire::test(SubscribeForm::class)
        ->set('name', 'Jan Kowalski')
        ->set('email', 'jan@example.com')
        ->call('submit')
        ->assertSet('submitted', true);
});

it('dispatches SendWelcomeMail job when re-subscribing with existing email', function () {
    Queue::fake();

    $subscriber = Subscriber::factory()->create(['email' => 'jan@example.com', 'status' => 'unsubscribed']);

    Livewire::test(SubscribeForm::class)
        ->set('name', 'Jan Kowalski')
        ->set('email', 'jan@example.com')
        ->call('submit');

    Queue::assertPushed(SendWelcomeMail::class, function ($job) use ($subscriber) {
        return $job->subscriber->is($subscriber);
    });

    expect($subscriber->fresh()->status)->toBe('confirmed');
});
