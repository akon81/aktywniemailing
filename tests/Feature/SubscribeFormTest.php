<?php

use App\Jobs\SendWelcomeMail;
use App\Livewire\SubscribeForm;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Queue;
use Livewire\Livewire;

function subscribeFormData(): array
{
    return [
        'name' => 'Jan Kowalski',
        'email' => 'jan@example.com',
        'consentMarketing' => true,
        'consentPrivacy' => true,
    ];
}

it('dispatches SendWelcomeMail job on new subscription', function () {
    Queue::fake();

    Livewire::test(SubscribeForm::class)
        ->fill(subscribeFormData())
        ->call('submit');

    Queue::assertPushed(SendWelcomeMail::class, function ($job) {
        return $job->subscriber->email === 'jan@example.com';
    });
});

it('creates subscriber and marks as confirmed', function () {
    Queue::fake();

    Livewire::test(SubscribeForm::class)
        ->fill(subscribeFormData())
        ->call('submit');

    expect(Subscriber::where('email', 'jan@example.com')->first())
        ->not->toBeNull()
        ->status->toBe('confirmed');
});

it('sets submitted to true after successful subscription', function () {
    Queue::fake();

    Livewire::test(SubscribeForm::class)
        ->fill(subscribeFormData())
        ->call('submit')
        ->assertSet('submitted', true);
});

it('dispatches SendWelcomeMail job when re-subscribing with existing email', function () {
    Queue::fake();

    $subscriber = Subscriber::factory()->create(['email' => 'jan@example.com', 'status' => 'unsubscribed']);

    Livewire::test(SubscribeForm::class)
        ->fill(subscribeFormData())
        ->call('submit');

    Queue::assertPushed(SendWelcomeMail::class, function ($job) use ($subscriber) {
        return $job->subscriber->is($subscriber);
    });

    expect($subscriber->fresh()->status)->toBe('confirmed');
});

it('stores consent data and IP on subscription', function () {
    Queue::fake();

    Livewire::test(SubscribeForm::class)
        ->fill(subscribeFormData())
        ->call('submit');

    $subscriber = Subscriber::where('email', 'jan@example.com')->first();

    expect($subscriber)
        ->consent_marketing->toBeTrue()
        ->consent_privacy->toBeTrue()
        ->consent_marketing_at->not->toBeNull()
        ->consent_privacy_at->not->toBeNull()
        ->consent_ip->not->toBeNull()
        ->consent_marketing_text->toBe(SubscribeForm::CONSENT_MARKETING_TEXT)
        ->consent_privacy_text->toBe(SubscribeForm::CONSENT_PRIVACY_TEXT);
});

it('fails validation when consents are not checked', function () {
    Queue::fake();

    Livewire::test(SubscribeForm::class)
        ->set('name', 'Jan Kowalski')
        ->set('email', 'jan@example.com')
        ->call('submit')
        ->assertHasErrors(['consentMarketing', 'consentPrivacy']);

    Queue::assertNothingPushed();
});
