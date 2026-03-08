<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('ui.meta_title') }}</title>
    <meta name="description" content="{{ __('ui.meta_description') }}">

    {{-- Hreflang --}}
    <link rel="alternate" hreflang="pl" href="{{ url('/') }}">
    <link rel="alternate" hreflang="en" href="{{ url('/') }}">
    <link rel="alternate" hreflang="x-default" href="{{ url('/') }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="{{ __('ui.meta_title') }}">
    <meta property="og:description" content="{{ __('ui.meta_description') }}">
    <meta property="og:locale" content="{{ app()->getLocale() === 'pl' ? 'pl_PL' : 'en_US' }}">
    <meta property="og:locale:alternate" content="{{ app()->getLocale() === 'pl' ? 'en_US' : 'pl_PL' }}">

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
        <a href="#dlaczego-warto" class="nav-link text-[13px] text-h-gray">{{ __('ui.nav_why') }}</a>
        <a href="#korzysci"       class="nav-link text-[13px] text-h-gray">{{ __('ui.nav_program') }}</a>
      </nav>

      {{-- Desktop CTA + Language switcher --}}
      <div class="hidden md:flex items-center gap-6">
        <x-language-switcher />
        <a href="#zapisz-sie"
           class="inline-flex items-center rounded-sm bg-gold-dark text-white text-[13px] font-medium px-6 py-3 btn-transition">
          {{ __('ui.nav_cta') }}
        </a>
      </div>

      {{-- Mobile hamburger --}}
      <button id="menu-toggle" class="md:hidden flex flex-col gap-1.5 p-2" aria-label="{{ __('ui.nav_menu') }}">
        <span class="block w-6 h-0.5 bg-h-dark transition-all duration-300"></span>
        <span class="block w-6 h-0.5 bg-h-dark transition-all duration-300"></span>
        <span class="block w-6 h-0.5 bg-h-dark transition-all duration-300"></span>
      </button>
    </div>

    {{-- Mobile menu --}}
    <div id="mobile-menu" class="md:hidden bg-h-bg border-t border-h-light/40">
      <div class="flex flex-col px-8 py-6 gap-5">
        <a href="#dlaczego-warto" class="nav-link text-sm text-h-gray" onclick="closeMobileMenu()">{{ __('ui.nav_why') }}</a>
        <a href="#korzysci"       class="nav-link text-sm text-h-gray" onclick="closeMobileMenu()">{{ __('ui.nav_program') }}</a>
        <a href="#zapisz-sie"
           class="inline-flex items-center justify-center rounded-sm bg-gold-dark text-white text-sm font-medium px-6 py-3 btn-transition"
           onclick="closeMobileMenu()">
          {{ __('ui.nav_cta') }}
        </a>
        <x-language-switcher />
      </div>
    </div>
  </header>

  {{-- ============================================================
       HERO
       ============================================================ --}}
  <section class="max-w-[1440px] mx-auto px-8 md:px-16 py-10 md:py-12 flex flex-col md:flex-row items-center gap-12 md:gap-16">

    {{-- Left --}}
    <div class="flex-1 flex flex-col gap-8 reveal">
      <h1 class="text-3xl md:text-3xl lg:text-4xl font-medium leading-[1.1] text-h-dark text-center md:text-left">
        {!! __('ui.hero_title') !!}
      </h1>
      <p class="text-base md:text-lg text-h-gray leading-[1.6] max-w-2xl">
        {{ __('ui.hero_description') }}
      </p>

      <div class="flex flex-col gap-4 max-w-[380px]">
        <p class="font-mono text-[13px] font-medium text-h-dark tracking-wide">{{ __('ui.hero_waiting_list_label') }}</p>
        @livewire('subscribe-form')
      </div>

      <p class="text-[13px] text-h-gray">{{ __('ui.hero_benefit_1') }}<br/>
{{ __('ui.hero_benefit_2') }}</p>
    </div>

    {{-- Right – hero image --}}
    <div class="flex-1 rounded-sm overflow-hidden min-h-[320px] md:min-h-[500px] reveal">
      <img src="{{ asset('img/hero/hero.jpg') }}" alt="{{ __('ui.hero_img_alt') }}" class="w-full h-full object-cover">
    </div>
  </section>


  {{-- ============================================================
       SECTION: PROBLEM + OBIETNICA
       ============================================================ --}}
  <section id="dlaczego-warto" class="bg-h-section">
    <div class="max-w-[1440px] mx-auto px-8 md:px-16 py-16 md:py-24 flex flex-col gap-16">

      {{-- PROBLEM --}}
      <div class="flex flex-col gap-12">

        {{-- Header --}}
        <div class="flex flex-col gap-4 reveal">
          <p class="font-mono text-[11px] font-medium tracking-[0.22em] uppercase text-h-primary">{{ __('ui.problem_label') }}</p>
          <h2 class="text-3xl md:text-[40px] font-medium leading-tight text-h-dark">
            {{ __('ui.problem_title') }}
          </h2>
        </div>

        {{-- Pain points grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-0">

          <div class="flex flex-col">
            @foreach([__('ui.problem_item_1'), __('ui.problem_item_2'), __('ui.problem_item_3')] as $i => $point)
            <div class="flex items-start gap-5 py-5 {{ $i > 0 ? 'border-t border-h-light/70' : '' }} reveal">
              <span class="font-mono text-[11px] text-h-primary/60 mt-1 shrink-0 w-5 text-right">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
              <p class="text-[15px] text-h-gray leading-[1.7]">{{ $point }}</p>
            </div>
            @endforeach
          </div>

          <div class="flex flex-col">
            @foreach([__('ui.problem_item_4'), __('ui.problem_item_5'), __('ui.problem_item_6')] as $i => $point)
            <div class="flex items-start gap-5 py-5 {{ $i > 0 ? 'border-t border-h-light/70' : '' }} reveal">
              <span class="font-mono text-[11px] text-h-primary/60 mt-1 shrink-0 w-5 text-right">{{ str_pad($i + 4, 2, '0', STR_PAD_LEFT) }}</span>
              <p class="text-[15px] text-h-gray leading-[1.7]">{{ $point }}</p>
            </div>
            @endforeach
          </div>

        </div>
      </div>

      {{-- Separator --}}
      <div class="flex items-center gap-6 reveal">
        <div class="flex-1 h-px bg-h-light"></div>
        <div class="flex gap-1.5">
          <div class="w-1.5 h-1.5 rounded-full bg-h-primary/30"></div>
          <div class="w-1.5 h-1.5 rounded-full bg-h-primary/60"></div>
          <div class="w-1.5 h-1.5 rounded-full bg-h-primary/30"></div>
        </div>
        <div class="flex-1 h-px bg-h-light"></div>
      </div>

      {{-- OBIETNICA --}}
      <div class="flex flex-col md:flex-row items-start md:items-center gap-10 md:gap-20 reveal">

        {{-- Left – statement --}}
        <div class="flex flex-col gap-5 md:flex-1">
          <p class="font-mono text-[11px] font-medium tracking-[0.22em] uppercase text-h-primary">{{ __('ui.promise_label') }}</p>
          <h2 class="text-3xl md:text-[40px] font-medium leading-tight text-h-dark">
            {!! __('ui.promise_title') !!}
          </h2>
        </div>

        {{-- Vertical divider (desktop only) --}}
        <div class="hidden md:block w-px self-stretch bg-h-light/70"></div>

        {{-- Right – description --}}
        <div class="flex flex-col gap-6 md:flex-1">
          <p class="text-[17px] text-h-dark font-medium leading-[1.6] italic">
            {{ __('ui.promise_quote') }}
          </p>
          <p class="text-[15px] text-h-gray leading-[1.75]">
            {{ __('ui.promise_description') }}
          </p>
          <a href="#zapisz-sie"
             class="self-start inline-flex items-center gap-2 text-[13px] font-medium text-h-primary hover:text-h-dark transition-colors duration-200">
            {{ __('ui.promise_cta') }}
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
            </svg>
          </a>
        </div>

      </div>

    </div>
  </section>

  {{-- ============================================================
       SECTION: CO OTRZYMASZ
       ============================================================ --}}
  <section id="korzysci" class="py-16 md:py-24 px-8 md:px-16 bg-white">
    <div class="max-w-[1440px] mx-auto flex flex-col gap-16">

      {{-- Section header --}}
      <div class="flex flex-col items-center gap-4 text-center reveal">
        <p class="font-mono text-[11px] font-medium tracking-[0.22em] uppercase text-h-primary">{{ __('ui.benefits_label') }}</p>
        <h2 class="text-3xl md:text-[40px] font-medium leading-tight text-h-dark">
          {{ __('ui.benefits_title') }}
        </h2>
      </div>

      {{-- Group 1: Jak będziesz się czuć --}}
      <div class="flex flex-col gap-8">

        {{-- Group label --}}
        <div class="flex items-center gap-6 reveal">
          <div class="flex-1 h-px bg-h-light"></div>
          <p class="font-mono text-[11px] font-medium tracking-[0.22em] uppercase text-h-primary/70 shrink-0">{{ __('ui.benefits_feel_label') }}</p>
          <div class="flex-1 h-px bg-h-light"></div>
        </div>

        {{-- Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

          <div class="plan-card flex flex-col gap-5 p-8 rounded-sm border border-h-light/60 bg-h-section/40 reveal">
            <div class="w-12 h-12 rounded-sm bg-h-section flex items-center justify-center">
              <svg class="w-6 h-6 text-h-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M9 9V4.5M9 9H4.5M9 9 3.75 3.75M9 15v4.5M9 15H4.5M9 15l-5.25 5.25M15 9h4.5M15 9V4.5M15 9l5.25-5.25M15 15h4.5M15 15v4.5m0-4.5 5.25 5.25"/>
              </svg>
            </div>
            <div class="flex flex-col gap-2">
              <h3 class="text-[18px] font-medium text-h-dark">{{ __('ui.benefits_feel_1_title') }}</h3>
              <p class="text-[14px] text-h-gray leading-[1.7]">{{ __('ui.benefits_feel_1_desc') }}</p>
            </div>
          </div>

          <div class="plan-card flex flex-col gap-5 p-8 rounded-sm border border-h-light/60 bg-h-section/40 reveal">
            <div class="w-12 h-12 rounded-sm bg-h-section flex items-center justify-center">
              <svg class="w-6 h-6 text-h-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M21.752 15.002A9.718 9.718 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z"/>
              </svg>
            </div>
            <div class="flex flex-col gap-2">
              <h3 class="text-[18px] font-medium text-h-dark">{{ __('ui.benefits_feel_2_title') }}</h3>
              <p class="text-[14px] text-h-gray leading-[1.7]">{{ __('ui.benefits_feel_2_desc') }}</p>
            </div>
          </div>

          <div class="plan-card flex flex-col gap-5 p-8 rounded-sm border border-h-light/60 bg-h-section/40 reveal">
            <div class="w-12 h-12 rounded-sm bg-h-section flex items-center justify-center">
              <svg class="w-6 h-6 text-h-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"/>
              </svg>
            </div>
            <div class="flex flex-col gap-2">
              <h3 class="text-[18px] font-medium text-h-dark">{{ __('ui.benefits_feel_3_title') }}</h3>
              <p class="text-[14px] text-h-gray leading-[1.7]">{{ __('ui.benefits_feel_3_desc') }}</p>
            </div>
          </div>

        </div>
      </div>

      {{-- Group 2: Co konkretnie otrzymasz --}}
      <div class="flex flex-col gap-8">

        {{-- Group label --}}
        <div class="flex items-center gap-6 reveal">
          <div class="flex-1 h-px bg-h-light"></div>
          <p class="font-mono text-[11px] font-medium tracking-[0.22em] uppercase text-h-primary/70 shrink-0">{{ __('ui.benefits_get_label') }}</p>
          <div class="flex-1 h-px bg-h-light"></div>
        </div>

        {{-- Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

          <div class="plan-card flex flex-col gap-5 p-8 rounded-sm border border-h-light/60 bg-white reveal">
            <div class="w-12 h-12 rounded-sm bg-h-section flex items-center justify-center">
              <svg class="w-6 h-6 text-h-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z"/>
              </svg>
            </div>
            <div class="flex flex-col gap-2">
              <h3 class="text-[18px] font-medium text-h-dark">{{ __('ui.benefits_get_1_title') }}</h3>
              <p class="text-[14px] text-h-gray leading-[1.7]">{{ __('ui.benefits_get_1_desc') }}</p>
            </div>
          </div>

          <div class="plan-card flex flex-col gap-5 p-8 rounded-sm border border-h-light/60 bg-white reveal">
            <div class="w-12 h-12 rounded-sm bg-h-section flex items-center justify-center">
              <svg class="w-6 h-6 text-h-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"/>
              </svg>
            </div>
            <div class="flex flex-col gap-2">
              <h3 class="text-[18px] font-medium text-h-dark">{{ __('ui.benefits_get_2_title') }}</h3>
              <p class="text-[14px] text-h-gray leading-[1.7]">{{ __('ui.benefits_get_2_desc') }}</p>
            </div>
          </div>

          <div class="plan-card flex flex-col gap-5 p-8 rounded-sm border border-h-light/60 bg-white reveal">
            <div class="w-12 h-12 rounded-sm bg-h-section flex items-center justify-center">
              <svg class="w-6 h-6 text-h-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
              </svg>
            </div>
            <div class="flex flex-col gap-2">
              <h3 class="text-[18px] font-medium text-h-dark">{{ __('ui.benefits_get_3_title') }}</h3>
              <p class="text-[14px] text-h-gray leading-[1.7]">{{ __('ui.benefits_get_3_desc') }}</p>
            </div>
          </div>

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
      <div class="text-gold text-5xl mb-6 opacity-60"></div>
      <blockquote class="text-3xl sm:text-4xl text-stone-100 italic leading-snug mb-8">
        {{ __('ui.quote_line_1') }}
        <span class="text-gold">{{ __('ui.quote_line_2') }}</span>
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
      <p class="font-mono text-[11px] font-medium tracking-[0.22em] uppercase text-h-primary">{{ __('ui.for_whom_label') }}</p>
      <h2 class="text-3xl md:text-[40px] font-medium leading-tight text-h-dark">
        {{ __('ui.for_whom_title') }}
      </h2>
      <p class="text-base md:text-lg text-h-gray max-w-xl">
        {{ __('ui.for_whom_description') }}
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
          <h3 class="text-[20px] font-medium text-h-dark">{{ __('ui.for_whom_1_title') }}</h3>
          <p class="text-[15px] text-h-gray leading-[1.6]">{{ __('ui.for_whom_1_desc') }}</p>
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
          <h3 class="text-[20px] font-medium text-h-dark">{{ __('ui.for_whom_2_title') }}</h3>
          <p class="text-[15px] text-h-gray leading-[1.6]">{{ __('ui.for_whom_2_desc') }}</p>
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
          <h3 class="text-[20px] font-medium text-h-dark">{{ __('ui.for_whom_3_title') }}</h3>
          <p class="text-[15px] text-h-gray leading-[1.6]">{{ __('ui.for_whom_3_desc') }}</p>
        </div>
      </div>

    </div>
  </section>

  {{-- ============================================================
       SECTION: DLACZEGO TERAZ
       ============================================================ --}}
  <section class="max-w-[1440px] mx-auto px-8 md:px-16 py-16 md:py-24 flex flex-col items-center gap-12">

    {{-- Header --}}
    <div class="flex flex-col items-center gap-4 text-center reveal">
      <p class="font-mono text-[11px] font-medium tracking-[0.22em] uppercase text-h-primary">{{ __('ui.cta_label') }}</p>
      <h2 class="text-3xl md:text-[40px] font-medium leading-tight text-h-dark">
        {{ __('ui.cta_title') }}
      </h2>
    </div>

    {{-- Points --}}
    <div class="flex flex-col w-full max-w-2xl gap-0">

      @foreach([
        [__('ui.cta_item_1_title'), __('ui.cta_item_1_desc')],
        [__('ui.cta_item_2_title'), __('ui.cta_item_2_desc')],
        [__('ui.cta_item_3_title'), __('ui.cta_item_3_desc')],
      ] as $i => $item)
      <div class="flex items-start gap-6 py-7 {{ $i > 0 ? 'border-t border-h-light/70' : '' }} reveal">
        <span class="font-mono text-[11px] text-h-primary/50 mt-1 shrink-0 w-5 text-right">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
        <div class="flex flex-col gap-1">
          <p class="text-[16px] font-medium text-h-dark">{{ $item[0] }}</p>
          <p class="text-[14px] text-h-gray leading-[1.7]">{{ $item[1] }}</p>
        </div>
      </div>
      @endforeach

    </div>

  </section>

  {{-- ============================================================
       SECTION: SIGN UP FORM
       ============================================================ --}}
  <section id="zapisz-sie" class="relative z-10 py-24 px-6 bg-stone-50">
    <div class="max-w-xl mx-auto">

      <div class="text-center mb-12">
        <p class="text-xs font-semibold tracking-[0.25em] uppercase text-gold mb-4">{{ __('ui.form_section_label') }}</p>
        <h2 class="text-4xl sm:text-5xl text-stone-900 mb-4">
          {!! __('ui.form_section_title') !!}
        </h2>
        <p class="text-stone-500 leading-relaxed text-sm md:text-base">
          {!! __('ui.form_section_description') !!}
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
  <footer class="relative z-10 py-16 px-8 md:px-16 bg-stone-900 text-stone-400 overflow-hidden">
    {{-- Decorative gold lines --}}
    <div class="absolute inset-0 opacity-5 decorative-gold-lines"></div>

    <div class="relative max-w-[1440px] mx-auto">

      {{-- 3 bloki --}}
      <div class="grid grid-cols-1 md:grid-cols-3 gap-12 pb-12 border-b border-stone-800">

        {{-- Blok 1 – Marka --}}
        <div class="flex flex-col gap-4">
          <div>
            <p class="text-stone-200 font-medium text-base">Aktywnie dla siebie</p>
            <p class="text-gold text-sm">{{ __('ui.footer_tagline') }}</p>
          </div>
          <p class="text-stone-500 text-sm leading-[1.7]">
            {!! __('ui.footer_description') !!}
          </p>
        </div>

        {{-- Blok 2 – Informacje --}}
        <div class="flex flex-col gap-4">
          <p class="text-stone-400 text-xs font-medium tracking-[0.18em] uppercase">{{ __('ui.footer_info_heading') }}</p>
          <nav class="flex flex-col gap-2">
            <a href="{{ route('privacy-policy') }}" class="text-stone-500 text-sm hover:text-stone-300 transition-colors duration-200">{{ __('ui.footer_privacy_policy') }}</a>
            <a href="#" class="text-stone-500 text-sm hover:text-stone-300 transition-colors duration-200">{{ __('ui.footer_terms') }}</a>
            <a href="#zapisz-sie" class="text-stone-500 text-sm hover:text-stone-300 transition-colors duration-200">{{ __('ui.footer_contact_label') }}</a>
          </nav>
        </div>

        {{-- Blok 3 – Kontakt --}}
        <div class="flex flex-col gap-4">
          <p class="text-stone-400 text-xs font-medium tracking-[0.18em] uppercase">{{ __('ui.footer_contact_heading') }}</p>
          <a href="mailto:kontakt@aktywniedlasiebie.pl"
             class="text-stone-500 text-sm hover:text-stone-300 transition-colors duration-200">
            kontakt@aktywniedlasiebie.pl
          </a>
        </div>

      </div>

      {{-- Copyright --}}
      <p class="text-xs text-stone-600 mt-8">
        {{ __('ui.footer_copyright', ['year' => date('Y')]) }}
      </p>

    </div>
  </footer>

  @livewireScripts
</body>
</html>
