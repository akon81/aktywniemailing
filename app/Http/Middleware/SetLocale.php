<?php

namespace App\Http\Middleware;

use App\Services\GeoIpService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function __construct(private readonly GeoIpService $geoIp) {}

    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('locale')) {
            $locale = session('locale');
        } else {
            $locale = $this->geoIp->detectLanguage($request->ip());
            session(['locale' => $locale]);
        }

        App::setLocale($locale);

        return $next($request);
    }
}
