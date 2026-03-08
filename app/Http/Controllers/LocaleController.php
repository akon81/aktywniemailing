<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LocaleController extends Controller
{
    private const SUPPORTED = ['pl', 'en'];

    public function __invoke(string $locale): RedirectResponse
    {
        abort_if(! in_array($locale, self::SUPPORTED), 404);

        session(['locale' => $locale]);

        return back();
    }
}
