<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strefa Premium · Ćwiczenia Video dla Kobiet 40+</title>
    <meta name="description" content="Strefa premium z ćwiczeniami video stworzona z myślą o kobietach po 40. roku życia. Zapisz się na listę oczekujących.">

    {{-- Fonts – wszystkie trzy rodziny w jednym requeście --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Sora:wght@300;400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-h-bg font-sora text-h-dark antialiased">

  {{-- ============================================================
       HEADER
       ============================================================ --}}
  <header id="site-header" class="sticky top-0 z-50 bg-h-bg/95 backdrop-blur-sm border-b border-h-light/40">
    <div class="max-w-[1440px] mx-auto px-16 py-6 flex items-center justify-between">

      {{-- Logo --}}
      <img src="{{ asset('img/aktywniedlasiebie_logo.png') }}" alt="Aktywnie dla Siebie" class="h-18">

      {{-- Desktop Nav --}}
      <nav class="hidden md:flex items-center gap-8">
        <a href="#korzysci"    class="nav-link text-[13px] text-h-gray">Korzyści</a>
        <a href="#o-programie" class="nav-link text-[13px] text-h-gray">O programie</a>
      </nav>

      {{-- Desktop CTA --}}
      <a href="#zapisz-sie"
         class="hidden md:inline-flex items-center rounded-sm bg-gold-dark text-white text-[13px] font-medium px-6 py-3 btn-transition">
        Zapisz się
      </a>

      {{-- Mobile hamburger --}}
      <button id="menu-toggle" class="md:hidden flex flex-col gap-1.5 p-2" aria-label="Menu">
        <span class="block w-6 h-0.5 bg-h-dark transition-all duration-300"></span>
        <span class="block w-6 h-0.5 bg-h-dark transition-all duration-300"></span>
        <span class="block w-6 h-0.5 bg-h-dark transition-all duration-300"></span>
      </button>
    </div>

    {{-- Mobile menu --}}
    <div id="mobile-menu" class="md:hidden bg-h-bg border-t border-h-light/40">
      <div class="flex flex-col px-8 py-6 gap-5">
        <a href="#korzysci"    class="nav-link text-sm text-h-gray" onclick="closeMobileMenu()">Korzyści</a>
        <a href="#o-programie" class="nav-link text-sm text-h-gray" onclick="closeMobileMenu()">O programie</a>
        <a href="#zapisz-sie"
           class="inline-flex items-center justify-center rounded-sm bg-gold-dark text-white text-sm font-medium px-6 py-3 btn-transition"
           onclick="closeMobileMenu()">
          Zapisz się
        </a>
      </div>
    </div>
  </header>

  {{-- ============================================================
       HERO
       ============================================================ --}}
  <section class="max-w-[1440px] mx-auto px-8 md:px-16 py-16 md:py-20 flex flex-col md:flex-row items-center gap-12 md:gap-16">

    {{-- Left --}}
    <div class="flex-1 flex flex-col gap-8 reveal">
      <h1 class="text-4xl md:text-5xl lg:text-[56px] font-medium leading-[1.1] text-h-dark">
        Odkryj spokój i siłę<br>Twojego ciała
      </h1>
      <p class="text-base md:text-lg text-h-gray leading-[1.6] max-w-2xl">
        Dołącz do strefy premium z ćwiczeniami Pilates i relaksacji, stworzonej specjalnie dla kobiet&nbsp;40+.
        Poczuj różnicę już od pierwszego tygodnia.
      </p>

      <div class="flex flex-col gap-4 max-w-[380px]">
        <p class="font-mono text-[13px] font-medium text-h-dark tracking-wide">Zapisz się na listę mailingową</p>
        <a href="#zapisz-sie"
           class="h-[52px] rounded-sm bg-gold-dark text-white text-[15px] font-medium flex items-center justify-center btn-transition">
          Zapisz się bezpłatnie
        </a>
      </div>

      <p class="text-[13px] text-h-gray">✓ Bądź na bieżąco z postępami prac nad strefą premium</p>
    </div>

    {{-- Right – hero image --}}
    <div class="flex-1 rounded-sm overflow-hidden min-h-[320px] md:min-h-[500px] reveal">
      <img src="{{ asset('img/hero/hero.jpg') }}" alt="Kobieta ćwicząca Pilates" class="w-full h-full object-cover">
    </div>
  </section>


  {{-- ============================================================
       SECTION: CO OTRZYMASZ
       ============================================================ --}}
  <section id="korzysci" class="relative z-10 py-24 px-6 bg-white">
    <div class="max-w-5xl mx-auto">

      <div class="text-center mb-16">
        <p class="text-xs font-semibold tracking-[0.25em] uppercase text-gold mb-4">Co otrzymasz</p>
        <h2 class="text-4xl sm:text-5xl text-stone-800 mb-4">
          Zaprojektowane dla Ciebie
        </h2>
        <div class="w-12 h-px bg-gold mx-auto mt-6"></div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <div class="plan-card bg-white/70 backdrop-blur-sm border border-gold/15 rounded-sm p-8">
          <div class="w-12 h-12 rounded-sm bg-h-section flex items-center justify-center mb-5">
            <svg class="w-6 h-6 text-h-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M15 10l4.553-2.069A1 1 0 0121 8.82V15a1 1 0 01-1.447.894L15 14M3 8a2 2 0 012-2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z"/>
            </svg>
          </div>
          <h3 class="text-xl text-stone-800 mb-2">Ćwiczenia video</h3>
          <p class="text-stone-500 text-sm leading-relaxed">
            Starannie dobrane treningi w formacie video — możesz ćwiczyć kiedy chcesz i gdzie chcesz.
          </p>
        </div>

        <div class="plan-card bg-white/70 backdrop-blur-sm border border-gold/15 rounded-sm p-8">
          <div class="w-12 h-12 rounded-sm bg-h-section flex items-center justify-center mb-5">
            <svg class="w-6 h-6 text-h-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
            </svg>
          </div>
          <h3 class="text-xl text-stone-800 mb-2">Dopasowane do 40+</h3>
          <p class="text-stone-500 text-sm leading-relaxed">
            Każde ćwiczenie uwzględnia specyficzne potrzeby i możliwości ciała kobiety po czterdziestce.
          </p>
        </div>

        <div class="plan-card bg-white/70 backdrop-blur-sm border border-gold/15 rounded-sm p-8">
          <div class="w-12 h-12 rounded-sm bg-h-section flex items-center justify-center mb-5">
            <svg class="w-6 h-6 text-h-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
            </svg>
          </div>
          <h3 class="text-xl text-stone-800 mb-2">Ekskluzywny dostęp</h3>
          <p class="text-stone-500 text-sm leading-relaxed">
            Jako pierwsza na liście otrzymasz specjalną ofertę startową i dostęp przed premierą.
          </p>
        </div>

        <div class="plan-card bg-white/70 backdrop-blur-sm border border-gold/15 rounded-sm p-8">
          <div class="w-12 h-12 rounded-sm bg-h-section flex items-center justify-center mb-5">
            <svg class="w-6 h-6 text-h-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/>
            </svg>
          </div>
          <h3 class="text-xl text-stone-800 mb-2">Twoje tempo</h3>
          <p class="text-stone-500 text-sm leading-relaxed">
            Bez presji, bez ścigania się z innymi. Postęp na Twoich zasadach, w Twoim rytmie.
          </p>
        </div>

        <div class="plan-card bg-white/70 backdrop-blur-sm border border-gold/15 rounded-sm p-8">
          <div class="w-12 h-12 rounded-sm bg-h-section flex items-center justify-center mb-5">
            <svg class="w-6 h-6 text-h-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
          </div>
          <h3 class="text-xl text-stone-800 mb-2">Społeczność kobiet</h3>
          <p class="text-stone-500 text-sm leading-relaxed">
            Dołącz do grupy inspirujących kobiet, które tak jak Ty postawiły na siebie.
          </p>
        </div>

        <div class="plan-card bg-white/70 backdrop-blur-sm border border-gold/15 rounded-sm p-8">
          <div class="w-12 h-12 rounded-sm bg-h-section flex items-center justify-center mb-5">
            <svg class="w-6 h-6 text-h-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

  {{-- ============================================================
       SECTION: QUOTE / MANIFESTO
       ============================================================ --}}
  <section class="relative z-10 py-24 px-6 overflow-hidden bg-quote-gradient">

    {{-- Decorative gold lines --}}
    <div class="absolute inset-0 opacity-5 decorative-gold-lines"></div>

    <div class="relative max-w-2xl mx-auto text-center">
      <div class="text-gold text-5xl mb-6 opacity-60">""</div>
      <blockquote class="text-3xl sm:text-4xl text-stone-100 italic leading-snug mb-8">
        Twoje ciało jest gotowe. Ty też jesteś gotowa.
        <span class="text-gold">Czas zacząć.</span>
      </blockquote>
      <div class="w-12 h-px bg-gold/50 mx-auto"></div>
    </div>
  </section>

  {{-- ============================================================
       BENEFITS
       ============================================================ --}}
  <section id="o-programie" class="max-w-[1440px] mx-auto px-8 md:px-16 py-16 md:py-24 flex flex-col gap-14">

    {{-- Header --}}
    <div class="flex flex-col items-center gap-4 text-center reveal">
      <p class="font-mono text-[11px] font-medium tracking-[0.22em] uppercase text-h-primary">Dla kogo jest program</p>
      <h2 class="text-3xl md:text-[40px] font-medium leading-tight text-h-dark">
        Twoja transformacja zaczyna się tutaj
      </h2>
      <p class="text-base md:text-lg text-h-gray max-w-xl">
        Program stworzony z myślą o Tobie — łącząc ruch, oddech i spokój umysłu
      </p>
    </div>

    {{-- Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

      <div class="plan-card flex flex-col gap-6 p-10 rounded-sm border border-h-light/60 bg-white reveal">
        <div class="w-12 h-12 rounded-sm bg-h-section flex items-center justify-center">
          <svg class="w-6 h-6 text-h-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99"/>
          </svg>
        </div>
        <div class="flex flex-col gap-3">
          <h3 class="text-[20px] font-medium text-h-dark">Gibkość i siła</h3>
          <p class="text-[15px] text-h-gray leading-[1.6]">
            Wzmocnij mięśnie głębokie i popraw elastyczność ciała dzięki regularnym ćwiczeniom Pilates
            dostosowanym do Twoich możliwości.
          </p>
        </div>
      </div>

      <div class="plan-card flex flex-col gap-6 p-10 rounded-sm border border-h-light/60 bg-white reveal">
        <div class="w-12 h-12 rounded-sm bg-h-section flex items-center justify-center">
          <svg class="w-6 h-6 text-h-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M21.752 15.002A9.718 9.718 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z"/>
          </svg>
        </div>
        <div class="flex flex-col gap-3">
          <h3 class="text-[20px] font-medium text-h-dark">Spokój umysłu</h3>
          <p class="text-[15px] text-h-gray leading-[1.6]">
            Techniki relaksacji i mindfulness pomogą Ci odnaleźć wewnętrzny spokój i lepiej radzić sobie
            ze stresem codzienności.
          </p>
        </div>
      </div>

      <div class="plan-card flex flex-col gap-6 p-10 rounded-sm border border-h-light/60 bg-white reveal">
        <div class="w-12 h-12 rounded-sm bg-h-section flex items-center justify-center">
          <svg class="w-6 h-6 text-h-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"/>
          </svg>
        </div>
        <div class="flex flex-col gap-3">
          <h3 class="text-[20px] font-medium text-h-dark">Energia na co dzień</h3>
          <p class="text-[15px] text-h-gray leading-[1.6]">
            Poczuj przypływ energii i pewności siebie. Regularna praktyka pomoże Ci czuć się młodziej
            i bardziej witalne każdego dnia.
          </p>
        </div>
      </div>

    </div>
  </section>

  {{-- ============================================================
       SECTION: SIGN UP FORM
       ============================================================ --}}
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
      <div class="bg-white/70 backdrop-blur-sm border border-stone-100 rounded-sm p-8 shadow-xl shadow-stone-200/50">
        @livewire('subscribe-form')
      </div>

    </div>
  </section>

  {{-- ============================================================
       FOOTER
       ============================================================ --}}
  <footer class="relative z-10 py-12 px-6 bg-stone-900 text-stone-400 overflow-hidden">
    {{-- Decorative gold lines --}}
    <div class="absolute inset-0 opacity-5 decorative-gold-lines"></div>

    <div class="relative max-w-4xl mx-auto text-center">
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
