<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wypisano z listy · Aktywnie dla Siebie</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Sora:wght@300;400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-h-bg font-sora text-h-dark antialiased min-h-screen flex flex-col items-center justify-center px-6">

    <div class="max-w-md w-full text-center flex flex-col items-center gap-6">

        {{-- Icon --}}
        <div class="w-16 h-16 rounded-sm bg-h-section flex items-center justify-center">
            <svg class="w-7 h-7 text-h-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"/>
            </svg>
        </div>

        {{-- Heading --}}
        <div class="flex flex-col gap-3">
            <p class="font-mono text-[11px] font-medium tracking-[0.22em] uppercase text-h-primary">Lista mailingowa</p>
            <h1 class="text-3xl font-medium text-h-dark leading-tight">
                Zostałaś wypisana
            </h1>
            <p class="text-h-gray leading-[1.7]">
                Twój adres email został usunięty z listy oczekujących.
                Nie będziesz już otrzymywać wiadomości od nas.
            </p>
        </div>

        {{-- Divider --}}
        <div class="w-12 h-px bg-h-light"></div>

        {{-- Back link --}}
        <a href="{{ route('home') }}"
           class="inline-flex items-center gap-2 text-[13px] text-h-gray hover:text-h-primary transition-colors duration-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
            </svg>
            Wróć na stronę główną
        </a>

    </div>

</body>
</html>
