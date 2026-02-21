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
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,300;1,400&family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --gold:       #c9a84c;
            --gold-light: #e8d5a3;
            --gold-dark:  #a8872e;
            --stone-50:   #fafaf9;
            --stone-100:  #f5f5f4;
            --stone-800:  #292524;
            --stone-900:  #1c1917;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Jost', sans-serif;
            background-color: var(--stone-50);
            color: var(--stone-800);
            overflow-x: hidden;
        }

        .font-display { font-family: 'Cormorant Garamond', serif; }

        .text-gold   { color: var(--gold); }
        .bg-gold     { background-color: var(--gold); }
        .bg-gold-dark { background-color: var(--gold-dark); }
        .border-gold { border-color: var(--gold); }
        .ring-gold   { --tw-ring-color: var(--gold); }

        /* ─── Noise texture overlay ─── */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.03'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
            opacity: 0.4;
        }

        /* ─── Hero gradient mesh ─── */
        .hero-bg {
            background:
                radial-gradient(ellipse 80% 60% at 50% -10%, rgba(201,168,76,0.12) 0%, transparent 70%),
                radial-gradient(ellipse 50% 40% at 90% 80%, rgba(201,168,76,0.07) 0%, transparent 60%),
                var(--stone-50);
        }

        /* ─── Decorative line ─── */
        .ornament-line {
            display: flex;
            align-items: center;
            gap: 16px;
            color: var(--gold);
        }
        .ornament-line::before,
        .ornament-line::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(to right, transparent, var(--gold-light), transparent);
        }

        /* ─── Feature card ─── */
        .feature-card {
            background: rgba(255,255,255,0.7);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(201,168,76,0.15);
            border-radius: 20px;
            padding: 32px 28px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(201,168,76,0.1);
        }

        /* ─── Form input overrides (complement Livewire) ─── */
        .form-input {
            width: 100%;
            background: rgba(255,255,255,0.7);
            border: 1px solid #e7e5e4;
            border-radius: 12px;
            padding: 14px 18px;
            font-family: 'Jost', sans-serif;
            font-size: 15px;
            color: var(--stone-800);
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
        }
        .form-input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(201,168,76,0.15);
        }
        .form-input::placeholder { color: #a8a29e; }

        .btn-gold {
            background: var(--gold);
            color: #fff;
            font-family: 'Jost', sans-serif;
            font-weight: 600;
            font-size: 15px;
            letter-spacing: 0.06em;
            padding: 16px 32px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
            width: 100%;
        }
        .btn-gold:hover {
            background: var(--gold-dark);
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(201,168,76,0.25);
        }

        /* ─── Section divider ─── */
        .section-divider {
            width: 48px;
            height: 1px;
            background: var(--gold);
            margin: 0 auto;
        }

        /* ─── Animations ─── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to   { opacity: 1; }
        }
        .animate-fade-up   { animation: fadeUp  0.8s ease both; }
        .animate-fade-in   { animation: fadeIn  0.6s ease both; }
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }

        /* ─── Dark footer ─── */
        .footer-dark {
            background: var(--stone-900);
            color: #a8a29e;
        }
    </style>

    @livewireStyles
</head>
<body class="relative">

    {{-- ═══════════════════════════════════════════
         HEADER / NAV
    ═══════════════════════════════════════════ --}}
    <header class="relative z-10 py-6 px-6">
        <div class="max-w-6xl mx-auto flex items-center justify-between">
            <div class="font-display text-2xl text-stone-800 tracking-wide">
                Strefa <span class="text-gold italic">Premium</span>
            </div>
            <a href="#zapisz-sie"
               class="hidden sm:inline-flex items-center gap-2 text-sm font-medium text-stone-500
                      hover:text-gold transition-colors duration-200 tracking-wide">
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
    <section class="hero-bg relative z-10 pt-16 pb-24 px-6">
        <div class="max-w-3xl mx-auto text-center">

            <div class="ornament-line justify-center mb-8 animate-fade-in">
                <span class="text-xs font-semibold tracking-[0.25em] uppercase text-gold">
                    Już wkrótce
                </span>
            </div>

            <h1 class="font-display text-5xl sm:text-6xl lg:text-7xl text-stone-900 leading-[1.1] mb-6 animate-fade-up">
                Ruch, który<br>
                <em class="text-gold italic">zmienia życie</em><br>
                po czterdziestce
            </h1>

            <p class="text-lg sm:text-xl text-stone-500 leading-relaxed max-w-xl mx-auto mb-10 font-light animate-fade-up delay-200">
                Strefa premium z ćwiczeniami video stworzona specjalnie dla kobiet 40+.
                Bez presji. Bez kompromisów. Z prawdziwą zmianą.
            </p>

            {{-- CTA button scrolls down --}}
            <a href="#zapisz-sie"
               class="inline-flex items-center gap-3 bg-gold hover:bg-gold-dark text-white
                      font-semibold tracking-wide px-10 py-4 rounded-full
                      transition-all duration-300 hover:shadow-xl hover:shadow-gold/20
                      hover:-translate-y-1 animate-fade-up delay-300">
                Zarezerwuj swoje miejsce
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </a>

            <p class="mt-4 text-xs text-stone-400 tracking-wide animate-fade-up delay-400">
                Bezpłatne · Bez zobowiązań · Dla Ciebie
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
                <h2 class="font-display text-4xl sm:text-5xl text-stone-900 mb-4">
                    Zaprojektowane <em class="italic">dla Ciebie</em>
                </h2>
                <div class="section-divider mt-6"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="feature-card">
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M15 10l4.553-2.069A1 1 0 0121 8.82V15a1 1 0 01-1.447.894L15 14M3 8a2 2 0 012-2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z"/>
                        </svg>
                    </div>
                    <h3 class="font-display text-xl text-stone-800 mb-2">Ćwiczenia video</h3>
                    <p class="text-stone-500 text-sm leading-relaxed">
                        Starannie dobrane treningi w formacie video — możesz ćwiczyć kiedy chcesz i gdzie chcesz.
                    </p>
                </div>

                <div class="feature-card">
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-display text-xl text-stone-800 mb-2">Dopasowane do 40+</h3>
                    <p class="text-stone-500 text-sm leading-relaxed">
                        Każde ćwiczenie uwzględnia specyficzne potrzeby i możliwości ciała kobiety po czterdziestce.
                    </p>
                </div>

                <div class="feature-card">
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <h3 class="font-display text-xl text-stone-800 mb-2">Ekskluzywny dostęp</h3>
                    <p class="text-stone-500 text-sm leading-relaxed">
                        Jako pierwsza na liście otrzymasz specjalną ofertę startową i dostęp przed premierą.
                    </p>
                </div>

                <div class="feature-card">
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/>
                        </svg>
                    </div>
                    <h3 class="font-display text-xl text-stone-800 mb-2">Twoje tempo</h3>
                    <p class="text-stone-500 text-sm leading-relaxed">
                        Bez presji, bez ścigania się z innymi. Postęp na Twoich zasadach, w Twoim rytmie.
                    </p>
                </div>

                <div class="feature-card">
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-display text-xl text-stone-800 mb-2">Społeczność kobiet</h3>
                    <p class="text-stone-500 text-sm leading-relaxed">
                        Dołącz do grupy inspirujących kobiet, które tak jak Ty postawiły na siebie.
                    </p>
                </div>

                <div class="feature-card">
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="font-display text-xl text-stone-800 mb-2">Realne efekty</h3>
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
            <div class="text-gold text-5xl font-display mb-6 opacity-60">"</div>
            <blockquote class="font-display text-3xl sm:text-4xl text-stone-100 italic leading-snug mb-8">
                Czterdziestka to nie koniec. To dopiero
                <span class="text-gold">początek najlepszej wersji siebie.</span>
            </blockquote>
            <div class="section-divider" style="background: #c9a84c; opacity: 0.5;"></div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         SECTION: SIGN UP FORM
    ═══════════════════════════════════════════ --}}
    <section id="zapisz-sie" class="relative z-10 py-24 px-6 hero-bg">
        <div class="max-w-xl mx-auto">

            <div class="text-center mb-12">
                <p class="text-xs font-semibold tracking-[0.25em] uppercase text-gold mb-4">Lista oczekujących</p>
                <h2 class="font-display text-4xl sm:text-5xl text-stone-900 mb-4">
                    Zarezerwuj swoje<br><em class="italic text-gold">miejsce</em>
                </h2>
                <p class="text-stone-500 leading-relaxed">
                    Zostaw swoje imię i email — jako pierwsza dowiesz się o starcie
                    i otrzymasz specjalną ofertę tylko dla osób z listy.
                </p>
                <div class="section-divider mt-8"></div>
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
    <footer class="footer-dark relative z-10 py-12 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <div class="font-display text-2xl text-stone-300 mb-3">
                Strefa <span class="text-gold italic">Premium</span>
            </div>
            <p class="text-sm text-stone-500 mb-6">
                Ćwiczenia video dla kobiet 40+ · Już wkrótce
            </p>
            <div class="section-divider" style="background: #44403c;"></div>
            <p class="text-xs text-stone-600 mt-6">
                © {{ date('Y') }} Strefa Premium · Wszelkie prawa zastrzeżone
            </p>
        </div>
    </footer>

    @livewireScripts
</body>
</html>
