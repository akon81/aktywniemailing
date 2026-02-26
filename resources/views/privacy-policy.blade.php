<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polityka Prywatności · Aktywnie dla siebie</title>
    <meta name="description" content="Polityka prywatności serwisu Aktywnie dla siebie – zasady przetwarzania danych osobowych i cookies.">

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

      {{-- Back link --}}
      <a href="{{ route('home') }}"
         class="hidden md:inline-flex items-center gap-2 text-[13px] text-h-gray hover:text-h-dark transition-colors duration-200">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
        </svg>
        Wróć na stronę główną
      </a>
    </div>
  </header>

  {{-- ============================================================
       CONTENT
       ============================================================ --}}
  <main class="max-w-[800px] mx-auto px-8 md:px-12 py-16 md:py-24">

    {{-- Page title --}}
    <div class="mb-12 reveal">
      <p class="font-mono text-[11px] font-medium text-h-primary tracking-[0.2em] uppercase mb-4">Dokument prawny</p>
      <h1 class="text-3xl md:text-4xl font-medium text-h-dark leading-[1.15] mb-4">Polityka Prywatności</h1>
      <p class="text-h-gray text-base">Aktywnie dla siebie</p>
      <div class="w-12 h-px bg-gold mt-6"></div>
    </div>

    {{-- Policy body --}}
    <div class="prose-policy flex flex-col gap-10">

      {{-- Section 1 --}}
      <section>
        <h2 class="text-base font-semibold text-h-dark mb-4 tracking-wide">1. Informacje ogólne</h2>
        <div class="flex flex-col gap-3 text-[15px] text-h-gray leading-[1.75]">
          <p>Niniejsza Polityka Prywatności określa zasady przetwarzania danych osobowych oraz wykorzystywania plików cookies w związku z korzystaniem ze strony internetowej prowadzonej pod marką „Aktywnie dla siebie".</p>
          <p>Administratorem danych osobowych jest:</p>
          <div class="bg-h-section border border-h-light/60 rounded-sm px-6 py-5 flex flex-col gap-1 text-[14px]">
            <p>[Imię i nazwisko / Nazwa firmy]</p>
            <p>[Adres prowadzenia działalności]</p>
            <p>NIP: [___]</p>
            <p>E-mail kontaktowy: <a href="mailto:kontakt@aktywniedlasiebie.pl" class="text-h-primary hover:text-gold-dark transition-colors">kontakt@aktywniedlasiebie.pl</a></p>
          </div>
          <p>Administrator dokłada szczególnej staranności w celu ochrony prywatności i przekazywanych informacji.</p>
        </div>
      </section>

      <div class="w-full h-px bg-h-light/50"></div>

      {{-- Section 2 --}}
      <section>
        <h2 class="text-base font-semibold text-h-dark mb-4 tracking-wide">2. Zakres przetwarzanych danych</h2>
        <div class="flex flex-col gap-3 text-[15px] text-h-gray leading-[1.75]">
          <p>W związku z korzystaniem ze strony mogą być przetwarzane następujące dane:</p>
          <div class="flex flex-col gap-4">
            <div>
              <p class="font-medium text-h-dark mb-2">a) Dane podawane dobrowolnie przez użytkownika:</p>
              <ul class="flex flex-col gap-1.5 pl-5">
                <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>imię,</span></li>
                <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>adres e-mail,</span></li>
                <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>ewentualnie inne dane przekazane w formularzu kontaktowym lub w odpowiedzi na wiadomość e-mail.</span></li>
              </ul>
            </div>
            <div>
              <p class="font-medium text-h-dark mb-2">b) Dane zbierane automatycznie:</p>
              <ul class="flex flex-col gap-1.5 pl-5">
                <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>adres IP,</span></li>
                <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>dane dotyczące przeglądarki,</span></li>
                <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>dane statystyczne dotyczące sposobu korzystania ze strony,</span></li>
                <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>pliki cookies.</span></li>
              </ul>
            </div>
          </div>
          <p>Podanie danych jest dobrowolne, jednak niezbędne do zapisania się na listę oczekujących, newsletter lub otrzymania informacji o ofercie.</p>
        </div>
      </section>

      <div class="w-full h-px bg-h-light/50"></div>

      {{-- Section 3 --}}
      <section>
        <h2 class="text-base font-semibold text-h-dark mb-4 tracking-wide">3. Cele przetwarzania danych</h2>
        <div class="flex flex-col gap-3 text-[15px] text-h-gray leading-[1.75]">
          <p>Dane osobowe przetwarzane są w następujących celach:</p>
          <ul class="flex flex-col gap-2 pl-5">
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span><span class="font-medium text-h-dark">Obsługa listy oczekujących / newslettera</span> – informowanie o starcie Strefy, przesyłanie treści edukacyjnych, ofert specjalnych.</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span><span class="font-medium text-h-dark">Kontakt bezpośredni</span> – odpowiedzi na wiadomości użytkowników.</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span><span class="font-medium text-h-dark">Realizacja usług cyfrowych</span> (po starcie platformy) – dostęp do materiałów video, obsługa kont użytkowników.</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>Marketing własnych usług i produktów.</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>Analiza statystyczna i optymalizacja strony.</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>Dochowanie obowiązków prawnych (np. księgowych w przypadku sprzedaży).</span></li>
          </ul>
        </div>
      </section>

      <div class="w-full h-px bg-h-light/50"></div>

      {{-- Section 4 --}}
      <section>
        <h2 class="text-base font-semibold text-h-dark mb-4 tracking-wide">4. Podstawa prawna przetwarzania danych</h2>
        <div class="flex flex-col gap-3 text-[15px] text-h-gray leading-[1.75]">
          <p>Dane przetwarzane są na podstawie:</p>
          <ul class="flex flex-col gap-2 pl-5">
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span><span class="font-medium text-h-dark">art. 6 ust. 1 lit. a RODO</span> – zgoda użytkownika (newsletter, lista oczekujących),</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span><span class="font-medium text-h-dark">art. 6 ust. 1 lit. b RODO</span> – realizacja umowy lub działania przed jej zawarciem,</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span><span class="font-medium text-h-dark">art. 6 ust. 1 lit. c RODO</span> – obowiązki prawne,</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span><span class="font-medium text-h-dark">art. 6 ust. 1 lit. f RODO</span> – prawnie uzasadniony interes administratora (marketing własnych usług, analiza statystyk).</span></li>
          </ul>
        </div>
      </section>

      <div class="w-full h-px bg-h-light/50"></div>

      {{-- Section 5 --}}
      <section>
        <h2 class="text-base font-semibold text-h-dark mb-4 tracking-wide">5. Okres przechowywania danych</h2>
        <div class="flex flex-col gap-3 text-[15px] text-h-gray leading-[1.75]">
          <p>Dane będą przechowywane:</p>
          <ul class="flex flex-col gap-2 pl-5">
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>do momentu cofnięcia zgody (w przypadku newslettera),</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>przez czas trwania współpracy oraz po jej zakończeniu – w zakresie wymaganym przepisami prawa,</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>przez okres niezbędny do zabezpieczenia roszczeń.</span></li>
          </ul>
          <p>Użytkownik może w każdej chwili wycofać zgodę poprzez kliknięcie linku rezygnacji w wiadomości e-mail.</p>
        </div>
      </section>

      <div class="w-full h-px bg-h-light/50"></div>

      {{-- Section 6 --}}
      <section>
        <h2 class="text-base font-semibold text-h-dark mb-4 tracking-wide">6. Odbiorcy danych</h2>
        <div class="flex flex-col gap-3 text-[15px] text-h-gray leading-[1.75]">
          <p>Dane mogą być przekazywane podmiotom wspierającym Administratora w prowadzeniu strony, w szczególności:</p>
          <ul class="flex flex-col gap-2 pl-5">
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>dostawcy hostingu,</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>dostawcy systemu mailingowego,</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>dostawcy systemu płatności (po uruchomieniu sprzedaży),</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>dostawcy narzędzi analitycznych,</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>biuru księgowemu.</span></li>
          </ul>
          <p>Podmioty te przetwarzają dane na podstawie umowy powierzenia i wyłącznie zgodnie z poleceniami Administratora.</p>
        </div>
      </section>

      <div class="w-full h-px bg-h-light/50"></div>

      {{-- Section 7 --}}
      <section>
        <h2 class="text-base font-semibold text-h-dark mb-4 tracking-wide">7. Przekazywanie danych poza UE</h2>
        <div class="flex flex-col gap-2 text-[15px] text-h-gray leading-[1.75]">
          <p>Jeżeli wykorzystywane narzędzia (np. system mailingowy lub analityczny) mają serwery poza Europejskim Obszarem Gospodarczym, dane mogą być przekazywane do państw trzecich z zachowaniem odpowiednich zabezpieczeń (np. standardowe klauzule umowne zatwierdzone przez Komisję Europejską).</p>
        </div>
      </section>

      <div class="w-full h-px bg-h-light/50"></div>

      {{-- Section 8 --}}
      <section>
        <h2 class="text-base font-semibold text-h-dark mb-4 tracking-wide">8. Prawa użytkownika</h2>
        <div class="flex flex-col gap-3 text-[15px] text-h-gray leading-[1.75]">
          <p>Każda osoba, której dane dotyczą, ma prawo do:</p>
          <ul class="flex flex-col gap-2 pl-5">
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>dostępu do swoich danych,</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>sprostowania danych,</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>usunięcia danych („prawo do bycia zapomnianym"),</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>ograniczenia przetwarzania,</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>przenoszenia danych,</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>wniesienia sprzeciwu wobec przetwarzania,</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>cofnięcia zgody w dowolnym momencie.</span></li>
          </ul>
          <p>W celu realizacji praw należy skontaktować się z Administratorem drogą e-mailową.</p>
          <p>Użytkownik ma również prawo wniesienia skargi do Prezesa Urzędu Ochrony Danych Osobowych.</p>
        </div>
      </section>

      <div class="w-full h-px bg-h-light/50"></div>

      {{-- Section 9 --}}
      <section>
        <h2 class="text-base font-semibold text-h-dark mb-4 tracking-wide">9. Pliki cookies</h2>
        <div class="flex flex-col gap-3 text-[15px] text-h-gray leading-[1.75]">
          <p>Strona wykorzystuje pliki cookies w celu:</p>
          <ul class="flex flex-col gap-2 pl-5">
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>prawidłowego działania strony,</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>prowadzenia statystyk,</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>działań marketingowych.</span></li>
          </ul>
          <p>Cookies to niewielkie pliki zapisywane na urządzeniu użytkownika.</p>
          <p>Użytkownik może w każdej chwili zmienić ustawienia cookies w swojej przeglądarce lub je usunąć. Ograniczenie stosowania cookies może wpłynąć na funkcjonowanie strony.</p>
        </div>
      </section>

      <div class="w-full h-px bg-h-light/50"></div>

      {{-- Section 10 --}}
      <section>
        <h2 class="text-base font-semibold text-h-dark mb-4 tracking-wide">10. Narzędzia analityczne i marketingowe</h2>
        <div class="flex flex-col gap-3 text-[15px] text-h-gray leading-[1.75]">
          <p>Strona może korzystać z narzędzi takich jak:</p>
          <ul class="flex flex-col gap-2 pl-5">
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>systemy mailingowe,</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>narzędzia analityczne (np. do mierzenia ruchu),</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>narzędzia reklamowe (np. piksel marketingowy).</span></li>
          </ul>
          <p>Narzędzia te mogą wykorzystywać cookies w celu analizy zachowań użytkowników oraz dopasowania treści marketingowych.</p>
        </div>
      </section>

      <div class="w-full h-px bg-h-light/50"></div>

      {{-- Section 11 --}}
      <section>
        <h2 class="text-base font-semibold text-h-dark mb-4 tracking-wide">11. Profilowanie</h2>
        <div class="flex flex-col gap-2 text-[15px] text-h-gray leading-[1.75]">
          <p>Dane mogą być wykorzystywane do profilowania w celach marketingowych (np. dopasowanie treści e-maili do zainteresowań użytkownika).</p>
          <p>Profilowanie nie wywołuje wobec użytkownika skutków prawnych ani w istotny sposób na niego nie wpływa.</p>
        </div>
      </section>

      <div class="w-full h-px bg-h-light/50"></div>

      {{-- Section 12 --}}
      <section>
        <h2 class="text-base font-semibold text-h-dark mb-4 tracking-wide">12. Zabezpieczenia danych</h2>
        <div class="flex flex-col gap-3 text-[15px] text-h-gray leading-[1.75]">
          <p>Administrator stosuje odpowiednie środki techniczne i organizacyjne w celu ochrony danych przed:</p>
          <ul class="flex flex-col gap-2 pl-5">
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>nieuprawnionym dostępem,</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>utratą,</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>zniszczeniem,</span></li>
            <li class="flex items-start gap-2"><span class="mt-2 w-1 h-1 rounded-full bg-gold-dark shrink-0"></span><span>ujawnieniem osobom trzecim.</span></li>
          </ul>
        </div>
      </section>

      <div class="w-full h-px bg-h-light/50"></div>

      {{-- Section 13 --}}
      <section>
        <h2 class="text-base font-semibold text-h-dark mb-4 tracking-wide">13. Zmiany Polityki Prywatności</h2>
        <div class="flex flex-col gap-2 text-[15px] text-h-gray leading-[1.75]">
          <p>Polityka Prywatności może być aktualizowana w przypadku zmian prawnych lub technologicznych. Aktualna wersja zawsze znajduje się na stronie internetowej.</p>
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
        Wróć na stronę główną
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
            <p class="text-gold text-sm">Strefa Premium dla kobiet 40+</p>
          </div>
          <p class="text-stone-500 text-sm leading-[1.7]">
            Ćwiczenia Pilates i relaksacja online.<br>Start już wkrótce.
          </p>
        </div>

        {{-- Blok 2 – Informacje --}}
        <div class="flex flex-col gap-4">
          <p class="text-stone-400 text-xs font-medium tracking-[0.18em] uppercase">Informacje</p>
          <nav class="flex flex-col gap-2">
            <a href="{{ route('privacy-policy') }}" class="text-stone-500 text-sm hover:text-stone-300 transition-colors duration-200">Polityka prywatności</a>
            <a href="#" class="text-stone-500 text-sm hover:text-stone-300 transition-colors duration-200">Regulamin</a>
            <a href="{{ route('home') }}#zapisz-sie" class="text-stone-500 text-sm hover:text-stone-300 transition-colors duration-200">Kontakt</a>
          </nav>
        </div>

        {{-- Blok 3 – Kontakt --}}
        <div class="flex flex-col gap-4">
          <p class="text-stone-400 text-xs font-medium tracking-[0.18em] uppercase">Kontakt</p>
          <a href="mailto:kontakt@aktywniedlasiebie.pl"
             class="text-stone-500 text-sm hover:text-stone-300 transition-colors duration-200">
            kontakt@aktywniedlasiebie.pl
          </a>
        </div>

      </div>

      <p class="text-xs text-stone-600 mt-8">
        © {{ date('Y') }} Aktywnie dla siebie · Wszelkie prawa zastrzeżone
      </p>

    </div>
  </footer>

</body>
</html>
