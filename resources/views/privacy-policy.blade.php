<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('ui.privacy_title') }} · Aktywnie dla siebie</title>
    <meta name="description" content="{{ __('ui.meta_description') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Sora:wght@300;400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-h-bg font-sora text-h-dark antialiased">

  {{-- ============================================================
       HEADER
       ============================================================ --}}
  <header class="sticky top-0 z-50 bg-h-bg/95 backdrop-blur-sm border-b border-h-light/40">
    <div class="max-w-[1440px] mx-auto px-8 md:px-16 py-6 flex items-center justify-between">

      {{-- Logo --}}
      <a href="{{ route('home') }}">
        <img src="{{ asset('img/aktywniedlasiebie_logo.png') }}" alt="Aktywnie dla Siebie" class="h-18">
      </a>

      {{-- Back link + Language switcher --}}
      <div class="hidden md:flex items-center gap-6">
        <x-language-switcher />
        <a href="{{ route('home') }}"
           class="inline-flex items-center gap-2 text-[13px] text-h-gray hover:text-h-dark transition-colors duration-200">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
          </svg>
          {{ __('ui.footer_back_home') }}
        </a>
      </div>
    </div>
  </header>

  {{-- ============================================================
       CONTENT
       ============================================================ --}}
  <main class="max-w-[800px] mx-auto px-8 md:px-12 py-16 md:py-24">

    {{-- Page title --}}
    <div class="mb-12 reveal">
      <p class="font-mono text-[11px] font-medium text-h-primary tracking-[0.2em] uppercase mb-4">{{ __('ui.privacy_legal_doc') }}</p>
      <h1 class="text-3xl md:text-4xl font-medium text-h-dark leading-[1.15] mb-4">{{ __('ui.privacy_title') }}</h1>
      <p class="text-h-gray text-base">{{ __('ui.privacy_subtitle') }}</p>
      <div class="w-12 h-px bg-gold mt-6"></div>
    </div>

    {{-- Policy body --}}
    <div class="prose-policy flex flex-col gap-10">

      {{-- Section 1 --}}
      <section>
        <h2 class="text-base font-semibold text-h-dark mb-4 tracking-wide">{{ __('ui.privacy_s1_title') }}</h2>
        <div class="flex flex-col gap-3 text-[15px] text-h-gray leading-[1.75]">
          <p>{{ __('ui.privacy_s1_p1') }}</p>
          <p>{{ __('ui.privacy_s1_p2') }}</p>
          <div class="bg-h-section border border-h-light/60 rounded-sm px-6 py-5 flex flex-col gap-1 text-[14px]">
            <p>[Imię i nazwisko / Nazwa firmy]</p>
            <p>[Adres prowadzenia działalności]</p>
            <p>NIP: [___]</p>
            <p>E-mail kontaktowy: <a href="mailto:kontakt@aktywniedlasiebie.pl" class="text-h-primary hover:text-gold-dark transition-colors">kontakt@aktywniedlasiebie.pl</a></p>
          </div>
          <p>{{ __('ui.privacy_s1_p3') }}</p>
        </div>
      </section>

      <div class="w-full h-px bg-h-light/50"></div>

      {{-- Section 2 --}}
      <section>
        <h2 class="text-base font-semibold text-h-dark mb-4 tracking-wide">{{ __('ui.privacy_s2_title') }}</h2>
        <div class="flex flex-col gap-3 text-[15px] text-h-gray leading-[1.75]">
          <p>{{ __('ui.privacy_s2_p1') }}</p>
          <div class="flex flex-col gap-4">
            <div>
              <p class="font-medium text-h-dark mb-2">{{ __('ui.privacy_s2_a_title') }}</p>
              <ul class="flex flex-col gap-1.5 pl-5">
                <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s2_a_1') }}</span></li>
                <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s2_a_2') }}</span></li>
                <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s2_a_3') }}</span></li>
              </ul>
            </div>
            <div>
              <p class="font-medium text-h-dark mb-2">{{ __('ui.privacy_s2_b_title') }}</p>
              <ul class="flex flex-col gap-1.5 pl-5">
                <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s2_b_1') }}</span></li>
                <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s2_b_2') }}</span></li>
                <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s2_b_3') }}</span></li>
                <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s2_b_4') }}</span></li>
              </ul>
            </div>
          </div>
          <p>{{ __('ui.privacy_s2_p2') }}</p>
        </div>
      </section>

      <div class="w-full h-px bg-h-light/50"></div>

      {{-- Section 3 --}}
      <section>
        <h2 class="text-base font-semibold text-h-dark mb-4 tracking-wide">{{ __('ui.privacy_s3_title') }}</h2>
        <div class="flex flex-col gap-3 text-[15px] text-h-gray leading-[1.75]">
          <p>{{ __('ui.privacy_s3_p1') }}</p>
          <ul class="flex flex-col gap-2 pl-5">
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{!! __('ui.privacy_s3_1') !!}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{!! __('ui.privacy_s3_2') !!}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{!! __('ui.privacy_s3_3') !!}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s3_4') }}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s3_5') }}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s3_6') }}</span></li>
          </ul>
        </div>
      </section>

      <div class="w-full h-px bg-h-light/50"></div>

      {{-- Section 4 --}}
      <section>
        <h2 class="text-base font-semibold text-h-dark mb-4 tracking-wide">{{ __('ui.privacy_s4_title') }}</h2>
        <div class="flex flex-col gap-3 text-[15px] text-h-gray leading-[1.75]">
          <p>{{ __('ui.privacy_s4_p1') }}</p>
          <ul class="flex flex-col gap-2 pl-5">
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{!! __('ui.privacy_s4_1') !!}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{!! __('ui.privacy_s4_2') !!}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{!! __('ui.privacy_s4_3') !!}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{!! __('ui.privacy_s4_4') !!}</span></li>
          </ul>
        </div>
      </section>

      <div class="w-full h-px bg-h-light/50"></div>

      {{-- Section 5 --}}
      <section>
        <h2 class="text-base font-semibold text-h-dark mb-4 tracking-wide">{{ __('ui.privacy_s5_title') }}</h2>
        <div class="flex flex-col gap-3 text-[15px] text-h-gray leading-[1.75]">
          <p>{{ __('ui.privacy_s5_p1') }}</p>
          <ul class="flex flex-col gap-2 pl-5">
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s5_1') }}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s5_2') }}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s5_3') }}</span></li>
          </ul>
          <p>{{ __('ui.privacy_s5_p2') }}</p>
        </div>
      </section>

      <div class="w-full h-px bg-h-light/50"></div>

      {{-- Section 6 --}}
      <section>
        <h2 class="text-base font-semibold text-h-dark mb-4 tracking-wide">{{ __('ui.privacy_s6_title') }}</h2>
        <div class="flex flex-col gap-3 text-[15px] text-h-gray leading-[1.75]">
          <p>{{ __('ui.privacy_s6_p1') }}</p>
          <ul class="flex flex-col gap-2 pl-5">
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s6_1') }}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s6_2') }}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s6_3') }}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s6_4') }}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s6_5') }}</span></li>
          </ul>
          <p>{{ __('ui.privacy_s6_p2') }}</p>
        </div>
      </section>

      <div class="w-full h-px bg-h-light/50"></div>

      {{-- Section 7 --}}
      <section>
        <h2 class="text-base font-semibold text-h-dark mb-4 tracking-wide">{{ __('ui.privacy_s7_title') }}</h2>
        <div class="flex flex-col gap-2 text-[15px] text-h-gray leading-[1.75]">
          <p>{{ __('ui.privacy_s7_p1') }}</p>
        </div>
      </section>

      <div class="w-full h-px bg-h-light/50"></div>

      {{-- Section 8 --}}
      <section>
        <h2 class="text-base font-semibold text-h-dark mb-4 tracking-wide">{{ __('ui.privacy_s8_title') }}</h2>
        <div class="flex flex-col gap-3 text-[15px] text-h-gray leading-[1.75]">
          <p>{{ __('ui.privacy_s8_p1') }}</p>
          <ul class="flex flex-col gap-2 pl-5">
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s8_1') }}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s8_2') }}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s8_3') }}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s8_4') }}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s8_5') }}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s8_6') }}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s8_7') }}</span></li>
          </ul>
          <p>{{ __('ui.privacy_s8_p2') }}</p>
          <p>{{ __('ui.privacy_s8_p3') }}</p>
        </div>
      </section>

      <div class="w-full h-px bg-h-light/50"></div>

      {{-- Section 9 --}}
      <section>
        <h2 class="text-base font-semibold text-h-dark mb-4 tracking-wide">{{ __('ui.privacy_s9_title') }}</h2>
        <div class="flex flex-col gap-3 text-[15px] text-h-gray leading-[1.75]">
          <p>{{ __('ui.privacy_s9_p1') }}</p>
          <ul class="flex flex-col gap-2 pl-5">
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s9_1') }}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s9_2') }}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s9_3') }}</span></li>
          </ul>
          <p>{{ __('ui.privacy_s9_p2') }}</p>
          <p>{{ __('ui.privacy_s9_p3') }}</p>
        </div>
      </section>

      <div class="w-full h-px bg-h-light/50"></div>

      {{-- Section 10 --}}
      <section>
        <h2 class="text-base font-semibold text-h-dark mb-4 tracking-wide">{{ __('ui.privacy_s10_title') }}</h2>
        <div class="flex flex-col gap-3 text-[15px] text-h-gray leading-[1.75]">
          <p>{{ __('ui.privacy_s10_p1') }}</p>
          <ul class="flex flex-col gap-2 pl-5">
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s10_1') }}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s10_2') }}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s10_3') }}</span></li>
          </ul>
          <p>{{ __('ui.privacy_s10_p2') }}</p>
        </div>
      </section>

      <div class="w-full h-px bg-h-light/50"></div>

      {{-- Section 11 --}}
      <section>
        <h2 class="text-base font-semibold text-h-dark mb-4 tracking-wide">{{ __('ui.privacy_s11_title') }}</h2>
        <div class="flex flex-col gap-2 text-[15px] text-h-gray leading-[1.75]">
          <p>{{ __('ui.privacy_s11_p1') }}</p>
          <p>{{ __('ui.privacy_s11_p2') }}</p>
        </div>
      </section>

      <div class="w-full h-px bg-h-light/50"></div>

      {{-- Section 12 --}}
      <section>
        <h2 class="text-base font-semibold text-h-dark mb-4 tracking-wide">{{ __('ui.privacy_s12_title') }}</h2>
        <div class="flex flex-col gap-3 text-[15px] text-h-gray leading-[1.75]">
          <p>{{ __('ui.privacy_s12_p1') }}</p>
          <ul class="flex flex-col gap-2 pl-5">
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s12_1') }}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s12_2') }}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s12_3') }}</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>{{ __('ui.privacy_s12_4') }}</span></li>
          </ul>
        </div>
      </section>

      <div class="w-full h-px bg-h-light/50"></div>

      {{-- Section 13 --}}
      <section>
        <h2 class="text-base font-semibold text-h-dark mb-4 tracking-wide">{{ __('ui.privacy_s13_title') }}</h2>
        <div class="flex flex-col gap-2 text-[15px] text-h-gray leading-[1.75]">
          <p>{{ __('ui.privacy_s13_p1') }}</p>
        </div>
      </section>

    </div>

    {{-- Back to home --}}
    <div class="mt-16 pt-8 border-t border-h-light/50">
      <a href="{{ route('home') }}"
         class="inline-flex items-center gap-2 text-[13px] text-h-gray hover:text-h-dark transition-colors duration-200">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
        </svg>
        {{ __('ui.footer_back_home') }}
      </a>
    </div>

  </main>

  {{-- ============================================================
       FOOTER
       ============================================================ --}}
  <footer class="relative z-10 py-16 px-8 md:px-16 bg-stone-900 text-stone-400 overflow-hidden">
    <div class="absolute inset-0 opacity-5 decorative-gold-lines"></div>

    <div class="relative max-w-[1440px] mx-auto">

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
            <a href="{{ route('home') }}#zapisz-sie" class="text-stone-500 text-sm hover:text-stone-300 transition-colors duration-200">{{ __('ui.footer_contact_label') }}</a>
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

      <p class="text-xs text-stone-600 mt-8">
        {{ __('ui.footer_copyright', ['year' => date('Y')]) }}
      </p>

    </div>
  </footer>

</body>
</html>
