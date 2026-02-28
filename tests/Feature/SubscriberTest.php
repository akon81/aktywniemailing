<?php

use App\Mail\WelcomeMail;
use App\Models\Subscriber;
use Illuminate\Support\Facades\App;

it('returns true from isPolish when language is pl', function () {
    $subscriber = Subscriber::factory()->make(['language' => 'pl']);

    expect($subscriber->isPolish())->toBeTrue();
});

it('returns false from isPolish when language is en', function () {
    $subscriber = Subscriber::factory()->make(['language' => 'en', 'country_code' => 'DE']);

    expect($subscriber->isPolish())->toBeFalse();
});

it('returns preferred locale matching subscriber language', function () {
    $plSubscriber = Subscriber::factory()->make(['language' => 'pl']);
    $enSubscriber = Subscriber::factory()->make(['language' => 'en', 'country_code' => 'DE']);

    expect($plSubscriber->preferredLocale())->toBe('pl');
    expect($enSubscriber->preferredLocale())->toBe('en');
});

it('uses single email view regardless of language', function () {
    $subscriber = Subscriber::factory()->make(['language' => 'pl']);
    $mail = new WelcomeMail($subscriber);

    expect($mail->content()->view)->toBe('emails.welcome');
});

it('sends Polish subject when locale is pl', function () {
    App::setLocale('pl');

    $subscriber = Subscriber::factory()->make(['language' => 'pl']);
    $mail = new WelcomeMail($subscriber);

    expect($mail->envelope()->subject)->toBe('Witaj na liście! Twoje miejsce jest zarezerwowane');
});

it('sends English subject when locale is en', function () {
    App::setLocale('en');

    $subscriber = Subscriber::factory()->make(['language' => 'en', 'country_code' => 'DE']);
    $mail = new WelcomeMail($subscriber);

    expect($mail->envelope()->subject)->toBe('Welcome! Your spot is reserved');
});
