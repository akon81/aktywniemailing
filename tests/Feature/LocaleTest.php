<?php

use App\Services\GeoIpService;
use Illuminate\Support\Facades\App;

beforeEach(function () {
    $this->geoIp = Mockery::mock(GeoIpService::class);
    app()->instance(GeoIpService::class, $this->geoIp);
});

it('defaults to pl when GeoIP returns PL country code', function () {
    $this->geoIp->shouldReceive('detectLanguage')->once()->andReturn('pl');

    $this->get('/');

    expect(App::getLocale())->toBe('pl');
});

it('sets en locale when GeoIP returns non-Polish country', function () {
    $this->geoIp->shouldReceive('detectLanguage')->once()->andReturn('en');

    $this->get('/');

    expect(App::getLocale())->toBe('en');
});

it('uses session locale instead of GeoIP on subsequent requests', function () {
    $this->geoIp->shouldReceive('detectLanguage')->never();

    $this->withSession(['locale' => 'en'])->get('/');

    expect(App::getLocale())->toBe('en');
});

it('saves detected locale to session on first visit', function () {
    $this->geoIp->shouldReceive('detectLanguage')->once()->andReturn('en');

    $response = $this->get('/');

    $response->assertSessionHas('locale', 'en');
});

it('switches locale via POST and saves to session', function () {
    // Session already has locale so middleware won't call GeoIP
    $response = $this->withSession(['locale' => 'pl'])
        ->post(route('locale.switch', 'en'));

    $response->assertRedirect();
    $response->assertSessionHas('locale', 'en');
});

it('switches locale back to pl via POST', function () {
    $response = $this->withSession(['locale' => 'en'])
        ->post(route('locale.switch', 'pl'));

    $response->assertRedirect();
    $response->assertSessionHas('locale', 'pl');
});

it('returns 404 for unsupported locale', function () {
    $this->withSession(['locale' => 'pl'])
        ->post(route('locale.switch', 'de'))
        ->assertNotFound();
});
