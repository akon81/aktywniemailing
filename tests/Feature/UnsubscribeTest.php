<?php

use App\Models\Subscriber;
use Illuminate\Support\Facades\URL;

it('shows unsubscribe confirmation for valid signed URL', function () {
    $subscriber = Subscriber::factory()->create(['status' => 'confirmed']);

    $url = URL::signedRoute('unsubscribe', ['email' => $subscriber->email]);

    $this->get($url)
        ->assertOk()
        ->assertViewIs('unsubscribe');
});

it('marks subscriber as unsubscribed', function () {
    $subscriber = Subscriber::factory()->create(['status' => 'confirmed']);

    $url = URL::signedRoute('unsubscribe', ['email' => $subscriber->email]);

    $this->get($url);

    expect($subscriber->fresh()->status)->toBe('unsubscribed');
});

it('returns 403 for invalid signature', function () {
    $this->get('/unsubscribe?email=test@example.com&signature=invalid')
        ->assertForbidden();
});

it('does not fail when subscriber does not exist', function () {
    $url = URL::signedRoute('unsubscribe', ['email' => 'nieistniejacy@example.com']);

    $this->get($url)->assertOk();
});
