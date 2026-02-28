<?php

use App\Jobs\SendWelcomeMail;
use App\Livewire\SubscribeForm;
use App\Models\Subscriber;
use App\Services\GeoIpService;
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

beforeEach(function () {
    $this->geoIp = Mockery::mock(GeoIpService::class);
    app()->instance(GeoIpService::class, $this->geoIp);
});

it('dispatches SendWelcomeMail job on new subscription', function () {
    Queue::fake();
    $this->geoIp->shouldReceive('detectCountryCode')->once()->andReturn('PL');

    Livewire::test(SubscribeForm::class)
        ->fill(subscribeFormData())
        ->call('submit');

    Queue::assertPushed(SendWelcomeMail::class, function ($job) {
        return $job->subscriber->email === 'jan@example.com';
    });
});

it('creates subscriber and marks as confirmed', function () {
    Queue::fake();
    $this->geoIp->shouldReceive('detectCountryCode')->once()->andReturn('PL');

    Livewire::test(SubscribeForm::class)
        ->fill(subscribeFormData())
        ->call('submit');

    expect(Subscriber::where('email', 'jan@example.com')->first())
        ->not->toBeNull()
        ->status->toBe('confirmed');
});

it('sets submitted to true after successful subscription', function () {
    Queue::fake();
    $this->geoIp->shouldReceive('detectCountryCode')->once()->andReturn('PL');

    Livewire::test(SubscribeForm::class)
        ->fill(subscribeFormData())
        ->call('submit')
        ->assertSet('submitted', true);
});

it('dispatches SendWelcomeMail job when re-subscribing with existing email', function () {
    Queue::fake();
    $this->geoIp->shouldReceive('detectCountryCode')->once()->andReturn('PL');

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
    $this->geoIp->shouldReceive('detectCountryCode')->once()->andReturn('PL');

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

it('saves polish country code and language for Polish subscriber', function () {
    Queue::fake();
    $this->geoIp->shouldReceive('detectCountryCode')->once()->andReturn('PL');

    Livewire::test(SubscribeForm::class)
        ->fill(subscribeFormData())
        ->call('submit');

    $subscriber = Subscriber::where('email', 'jan@example.com')->first();

    expect($subscriber)
        ->country_code->toBe('PL')
        ->language->toBe('pl');
});

it('saves english language for non-Polish subscriber', function () {
    Queue::fake();
    $this->geoIp->shouldReceive('detectCountryCode')->once()->andReturn('DE');

    Livewire::test(SubscribeForm::class)
        ->fill(subscribeFormData())
        ->call('submit');

    $subscriber = Subscriber::where('email', 'jan@example.com')->first();

    expect($subscriber)
        ->country_code->toBe('DE')
        ->language->toBe('en');
});

it('saves null country code and polish language when geolocation fails', function () {
    Queue::fake();
    $this->geoIp->shouldReceive('detectCountryCode')->once()->andReturn(null);

    Livewire::test(SubscribeForm::class)
        ->fill(subscribeFormData())
        ->call('submit');

    $subscriber = Subscriber::where('email', 'jan@example.com')->first();

    expect($subscriber)
        ->country_code->toBeNull()
        ->language->toBe('pl');
});
