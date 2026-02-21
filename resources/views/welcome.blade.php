<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strefa Premium · Ćwiczenia Video dla Kobiet 40+</title>
    <meta name="description" content="Strefa premium z ćwiczeniami video stworzona z myślą o kobietach po 40. roku życia. Zapisz się na listę oczekujących.">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>
<body class="relative bg-stone-50 text-stone-800 overflow-x-hidden">

    {{-- ═══════════════════════════════════════════
         HEADER / NAV
    ═══════════════════════════════════════════ --}}
    <header class="relative z-10 py-2 px-2 bg-gold">
        <div class="max-w-6xl mx-auto flex items-center justify-between">
            <div>
                <img src="{{ asset('img/aktywniedlasiebie_logo_biale_wector.svg') }}" alt="Aktywnie dla Siebie" class="h-28">
            </div>
            <a href="#zapisz-sie"
               class="hidden sm:inline-flex items-center gap-2 text-sm font-medium text-white
                      hover:text-gold-light transition-colors duration-200 tracking-wide">
                Zapisz się
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </header>

    {{-- ═══════════════════════════════════════════
         HERO SECTION
    ═══════════════════════════════════════════ --}}
    <section class="relative pt-16 pb-24 px-6 overflow-hidden bg-stone-50">
        {{-- Parallax Background --}}
        <div class="hero-parallax" id="heroParallax">
            <img src="{{ asset('img/hero/hero.jpg') }}" alt="" class="hero-parallax-image" id="heroImage">
        </div>
        
        <div class="max-w-3xl mx-auto text-center relative z-10">

            <div class="ornament-line flex items-center gap-4 justify-center mb-8 text-gold opacity-0 animate-[fadeIn_0.6s_ease_both]">
                <span class="text-xs font-semibold tracking-[0.25em] uppercase text-gray-700">
                    Już wkrótce
                </span>
            </div>

            <h1 class="text-5xl sm:text-6xl lg:text-7xl text-shadow-gray-800 leading-[1.1] mb-6 opacity-0 animate-[fadeUp_0.8s_ease_both] [text-shadow:0_2px_8px_rgba(0,0,0,0.1),0_4px_16px_rgba(0,0,0,0.08)]">
                Ruch, który<br>
                <em class="text-gold">zmienia życie</em><br>
                po czterdziestce
            </h1>

            <p class="text-lg sm:text-xl text-shadow-gray-600 leading-relaxed max-w-xl mx-auto mb-10 font-light opacity-0 animate-[fadeUp_0.8s_ease_both_0.2s] [text-shadow:0_2px_8px_rgba(0,0,0,0.1),0_4px_16px_rgba(0,0,0,0.08)]">
                Strefa premium z ćwiczeniami video stworzona specjalnie dla kobiet 40+.
                Bez presji. Bez kompromisów. Z prawdziwą zmianą.
            </p>

            {{-- CTA button scrolls down --}}
            <a href="#zapisz-sie"
               class="inline-flex items-center gap-3 bg-gold hover:bg-gold-dark text-white
                      font-semibold tracking-wide px-10 py-4 rounded-xl
                      transition-all duration-300 hover:shadow-xl hover:shadow-gold/20
                      hover:-translate-y-1 opacity-0 animate-[fadeUp_0.8s_ease_both_0.3s]">
                Zarezerwuj swoje miejsce
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </a>

            <p class="mt-4 text-xs text-shadow-gray-500 tracking-wide opacity-0 animate-[fadeUp_0.8s_ease_both_0.4s]">
                Bez zobowiązań · Dla Ciebie
            </p>

        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         SECTION: CO OTRZYMASZ
    ═══════════════════════════════════════════ --}}
    <section class="relative z-10 py-24 px-6 bg-white">
        <div class="max-w-5xl mx-auto">

            <div class="text-center mb-16">
                <p class="text-xs font-semibold tracking-[0.25em] uppercase text-gold mb-4">Co otrzymasz</p>
                <h2 class="text-4xl sm:text-5xl text-shadow-gray-800 mb-4">
                    Zaprojektowane dla Ciebie
                </h2>
                <div class="w-12 h-px bg-gold mx-auto mt-6"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="bg-white/70 backdrop-blur-sm border border-gold/15 rounded-[20px] p-8 transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_20px_40px_rgba(179,143,110,0.1)]">
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M15 10l4.553-2.069A1 1 0 0121 8.82V15a1 1 0 01-1.447.894L15 14M3 8a2 2 0 012-2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl text-stone-800 mb-2">Ćwiczenia video</h3>
                    <p class="text-stone-500 text-sm leading-relaxed">
                        Starannie dobrane treningi w formacie video — możesz ćwiczyć kiedy chcesz i gdzie chcesz.
                    </p>
                </div>

                <div class="bg-white/70 backdrop-blur-sm border border-gold/15 rounded-[20px] p-8 transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_20px_40px_rgba(179,143,110,0.1)]">
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl text-stone-800 mb-2">Dopasowane do 40+</h3>
                    <p class="text-stone-500 text-sm leading-relaxed">
                        Każde ćwiczenie uwzględnia specyficzne potrzeby i możliwości ciała kobiety po czterdziestce.
                    </p>
                </div>

                <div class="bg-white/70 backdrop-blur-sm border border-gold/15 rounded-[20px] p-8 transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_20px_40px_rgba(179,143,110,0.1)]">
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl text-stone-800 mb-2">Ekskluzywny dostęp</h3>
                    <p class="text-stone-500 text-sm leading-relaxed">
                        Jako pierwsza na liście otrzymasz specjalną ofertę startową i dostęp przed premierą.
                    </p>
                </div>

                <div class="bg-white/70 backdrop-blur-sm border border-gold/15 rounded-[20px] p-8 transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_20px_40px_rgba(179,143,110,0.1)]">
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/>
                        </svg>
                    </div>
                    <h3 class="text-xl text-stone-800 mb-2">Twoje tempo</h3>
                    <p class="text-stone-500 text-sm leading-relaxed">
                        Bez presji, bez ścigania się z innymi. Postęp na Twoich zasadach, w Twoim rytmie.
                    </p>
                </div>

                <div class="bg-white/70 backdrop-blur-sm border border-gold/15 rounded-[20px] p-8 transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_20px_40px_rgba(179,143,110,0.1)]">
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl text-stone-800 mb-2">Społeczność kobiet</h3>
                    <p class="text-stone-500 text-sm leading-relaxed">
                        Dołącz do grupy inspirujących kobiet, które tak jak Ty postawiły na siebie.
                    </p>
                </div>

                <div class="bg-white/70 backdrop-blur-sm border border-gold/15 rounded-[20px] p-8 transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_20px_40px_rgba(179,143,110,0.1)]">
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl text-stone-800 mb-2">Realne efekty</h3>
                    <p class="text-stone-500 text-sm leading-relaxed">
                        Treningi budowane z myślą o skuteczności — siła, mobilność, energii do życia.
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         SECTION: QUOTE / MANIFESTO
    ═══════════════════════════════════════════ --}}
    <section class="relative z-10 py-24 px-6 overflow-hidden"
             style="background: linear-gradient(135deg, #1c1917 0%, #292524 50%, #1c1917 100%);">

        {{-- Decorative gold lines --}}
        <div class="absolute inset-0 opacity-5"
             style="background-image: repeating-linear-gradient(45deg, #c9a84c 0, #c9a84c 1px, transparent 0, transparent 50%); background-size: 20px 20px;"></div>

        <div class="relative max-w-2xl mx-auto text-center">
            <div class="text-gold text-5xl mb-6 opacity-60">"”</div>
            <blockquote class="text-3xl sm:text-4xl text-stone-100 italic leading-snug mb-8">
                Twoje ciało jest gotowe. Ty też jesteś gotowa.
                <span class="text-gold">Czas zacząć.</span>
            </blockquote>
            <div class="w-12 h-px bg-gold/50 mx-auto"></div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         SECTION: SIGN UP FORM
    ═══════════════════════════════════════════ --}}
    <section id="zapisz-sie" class="relative z-10 py-24 px-6 bg-stone-50">
        <div class="max-w-xl mx-auto">

            <div class="text-center mb-12">
                <p class="text-xs font-semibold tracking-[0.25em] uppercase text-gold mb-4">Lista oczekujących</p>
                <h2 class="text-4xl sm:text-5xl text-stone-900 mb-4">
                    Zarezerwuj swoje<br><span class="text-gold">miejsce</span>
                </h2>
                <p class="text-stone-500 leading-relaxed">
                    Zostaw swoje imię i email — jako pierwsza dowiesz się o starcie
                    i otrzymasz specjalną ofertę tylko dla osób z listy.
                </p>
                <div class="w-12 h-px bg-gold mx-auto mt-8"></div>
            </div>

            {{-- Livewire Form --}}
            <div class="bg-white/70 backdrop-blur-sm border border-stone-100 rounded-2xl p-8 shadow-xl shadow-stone-200/50">
                @livewire('subscribe-form')
            </div>

        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         FOOTER
    ═══════════════════════════════════════════ --}}
    <footer class="relative z-10 py-12 px-6 bg-stone-900 text-stone-400">
        <div class="max-w-4xl mx-auto text-center">
            <div class="text-2xl text-stone-300 mb-3">
                Aktywnie dla siebie <span class="text-gold">Strefa Premium</span>
            </div>
            <p class="text-sm text-stone-500 mb-6">
                Ćwiczenia video dla kobiet 40+ · Już wkrótce
            </p>
            <div class="w-12 h-px bg-stone-700 mx-auto"></div>
            <p class="text-xs text-stone-600 mt-6">
                © {{ date('Y') }} Aktywnie dla siebie · Wszelkie prawa zastrzeżone
            </p>
        </div>
    </footer>

    @livewireScripts
</body>
</html>
