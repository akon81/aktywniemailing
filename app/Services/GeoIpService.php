<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeoIpService
{
    private const POLISH_COUNTRY_CODE = 'PL';

    public function detectCountryCode(string $ip): ?string
    {
        if ($this->isPrivateIp($ip)) {
            return null;
        }

        try {
            $response = Http::timeout(3)->get("http://ip-api.com/json/{$ip}", [
                'fields' => 'countryCode,status',
            ]);

            if ($response->successful() && $response->json('status') === 'success') {
                return $response->json('countryCode');
            }
        } catch (\Throwable $e) {
            Log::warning('GeoIpService: failed to detect country', ['ip' => $ip, 'error' => $e->getMessage()]);
        }

        return null;
    }

    public function detectLanguage(string $ip): string
    {
        $countryCode = $this->detectCountryCode($ip);

        return ($countryCode !== null && $countryCode !== self::POLISH_COUNTRY_CODE) ? 'en' : 'pl';
    }

    private function isPrivateIp(string $ip): bool
    {
        return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false;
    }
}
