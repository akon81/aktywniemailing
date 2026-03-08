Do zrobienia:

[✓] Wysłanie maila po wypełnieniu formularza poprzez queue - kolejkę i job

---

# Plan: Wdrożenie obsługi dwóch języków (PL/EN)

**Domyślny język:** polski (`pl`)
**Drugi język:** angielski (`en`)
**Data planu:** 2026-02-28

---

## Stan obecny

| Element | Stan |
|---|---|
| `lang/pl/email.php` | ✅ Gotowy (wszystkie klucze e-mail) |
| `lang/en/email.php` | ✅ Gotowy (wszystkie klucze e-mail) |
| `emails/welcome.blade.php` | ✅ Używa `__('email.xxx')` – gotowy |
| `GeoIpService` | ✅ Wykrywa kraj i ustawia `language` dla subskrybenta |
| `welcome.blade.php` | ❌ Tekst hardcoded po polsku |
| `privacy-policy.blade.php` | ❌ Tekst hardcoded po polsku |
| `livewire/subscribe-form.blade.php` | ❌ Tekst hardcoded po polsku |
| `SubscribeForm.php` | ❌ Komunikaty błędów i teksty zgód hardcoded po polsku |
| Nawigacja / stopka | ❌ Hardcoded po polsku |
| Przełącznik języka | ❌ Brak |
| Middleware lokalizacji | ❌ Brak |

---

## Wybrana strategia

**✅ Automatyczne wykrywanie + manualny przełącznik PL | EN w nagłówku**

Logika działania:
1. Pierwsza wizyta → brak wpisu w sesji → sprawdź `GeoIpService` (kraj z IP)
   - Kraj `PL` → ustaw `pl`
   - Dowolny inny kraj → ustaw `en`
2. Przy kolejnych odwiedzinach → odczytaj język z sesji (użytkownik mógł zmienić ręcznie)
3. Przełącznik `PL | EN` w nagłówku zawsze widoczny → zapisuje wybór do sesji

Dlaczego GeoIP a nie `Accept-Language` (przeglądarka)?
- `GeoIpService` jest już w projekcie i używany przy zapisie subskrybenta
- Wykrywa kraj na podstawie IP (dokładniejsze dla celu tej strony niż ustawienia przeglądarki)
- Spójność: ten sam mechanizm co przy wysyłce e-maila

---

## Zadania

---

### ETAP 1 – Infrastruktura backendu

#### 1.1 Konfiguracja domyślnego locale
**Plik:** `config/app.php`
- Upewnić się, że `'locale' => 'pl'` i `'fallback_locale' => 'pl'`

---

#### 1.2 Middleware ustawiania języka
**Plik do stworzenia:** `app/Http/Middleware/SetLocale.php`
**Komenda:** `php artisan make:class app/Http/Middleware/SetLocale`

Logika (w kolejności priorytetów):
1. Czy w sesji jest `locale`? → użyj go (użytkownik zmienił ręcznie)
2. Jeśli nie → wykryj kraj z IP przez `GeoIpService`
   - Kraj `PL` lub brak danych → `pl`
   - Inny kraj → `en`
3. Zapisz wykryty język do sesji (żeby nie wykrywać ponownie przy kolejnych żądaniach)
4. Ustaw `App::setLocale($locale)`

**Rejestracja:** `bootstrap/app.php` → `->withMiddleware()` dla grupy `web`

> **Uwaga:** `GeoIpService` jest już wstrzykiwany w `SubscribeForm`. W middleware należy rozwiązać go przez `app(GeoIpService::class)` lub wyodrębnić detekcję do serwisu.

---

#### 1.3 Akcja przełączania języka
**Plik do stworzenia:** `app/Http/Controllers/LocaleController.php`
**Komenda:** `php artisan make:controller LocaleController`

```php
public function __invoke(string $locale): RedirectResponse
{
    abort_if(!in_array($locale, ['pl', 'en']), 404);
    session(['locale' => $locale]);
    return back();
}
```

**Trasa** w `routes/web.php`:
```php
Route::post('/locale/{locale}', LocaleController::class)->name('locale.switch');
```

---

#### 1.4 Trasa polityki prywatności
**Aktualnie:** `/polityka-prywatnosci` – tylko po polsku.

Podejście: jeden widok `privacy-policy.blade.php`, treść zmienia się przez klucze `__()`.
Opcjonalnie: dodać alias `/privacy-policy` prowadzący do tego samego widoku (dla angielskojęzycznych użytkowników szukających go po angielsku).

---

### ETAP 2 – Pliki tłumaczeń (nowe pliki)

#### 2.1 `lang/pl/ui.php` – nowy plik
Klucze dla całego interfejsu strony. Główne grupy:

```
nav.*         – nawigacja (linki, CTA)
hero.*        – sekcja hero (tytuł, opis, lista korzyści)
problem.*     – sekcja "Czy to o Tobie?"
promise.*     – sekcja "Dlatego to tworzę"
benefits.*    – sekcja "Co otrzymasz"
quote.*       – cytat / manifesto
for_whom.*    – sekcja "Dla kogo jest program"
cta.*         – sekcja "Dlaczego warto zapisać się teraz?"
form.*        – formularz zapisu (etykiety, placeholdery, przyciski, zgody, sukces)
footer.*      – stopka (tagline, linki, copyright)
privacy.*     – polityka prywatności (wszystkie sekcje)
validation.*  – komunikaty błędów walidacji formularza
```

---

#### 2.2 `lang/en/ui.php` – nowy plik
Angielski odpowiednik wszystkich kluczy z `lang/pl/ui.php`.

---

### ETAP 3 – Aktualizacja widoków Blade

#### 3.1 `welcome.blade.php`
- Zamienić wszystkie hardcoded polskie teksty na `__('ui.klucz')` lub `{!! __('ui.klucz') !!}` (gdy klucz zawiera HTML)
- `<html lang="pl">` → `<html lang="{{ app()->getLocale() }}">`
- `<title>` → przetłumaczony klucz
- `<meta name="description">` → przetłumaczony klucz
- Dodać komponent `<x-language-switcher />` do nagłówka

---

#### 3.2 `livewire/subscribe-form.blade.php`
- Zamienić etykiety pól, placeholdery, tekst przycisku, zastrzeżenie na `__('ui.form.*')`
- Tekst sukcesu: `__('ui.form.success_title', ['name' => $name])`
- Tekst zgody z linkiem: `{!! __('ui.form.consent_privacy', ['link' => '<a href="...">...</a>']) !!}`

---

#### 3.3 `privacy-policy.blade.php`
- Zamienić nagłówki stron, sekcje i treść akapitów na `__('ui.privacy.*')`
- **Uwaga:** Polityka prywatności jest dokumentem prawnym – treść angielska powinna być sprawdzona przez prawnika przed wdrożeniem. Można tymczasowo wyświetlać polską wersję niezależnie od języka, dopóki angielski tekst nie będzie zatwierdzony.

---

#### 3.4 `emails/welcome.blade.php`
- ✅ Już używa `__('email.xxx')` – bez zmian w szablonie
- Wymaga tylko zapewnienia ustawienia locale przed renderowaniem (patrz 3.5)

---

#### 3.5 `app/Mail/WelcomeMail.php`
Upewnić się, że e-mail wysyłany jest w języku subskrybenta. Laravel Mailable obsługuje metodę `locale()`:

```php
return $this->locale($this->subscriber->language ?? 'pl')
            ->view('emails.welcome');
```

---

### ETAP 4 – Przełącznik języka w UI

#### 4.1 Komponent: `language-switcher`
**Plik do stworzenia:** `resources/views/components/language-switcher.blade.php`

Przykład wyglądu w nagłówku: `PL | EN`

Implementacja jako dwa formularze POST (bezpieczne, CSRF):
```html
<div class="flex items-center gap-2">
    @foreach(['pl', 'en'] as $lang)
        <form method="POST" action="{{ route('locale.switch', $lang) }}">
            @csrf
            <button type="submit"
                class="{{ app()->getLocale() === $lang ? 'text-h-dark font-medium' : 'text-h-gray hover:text-h-dark' }} text-[13px]">
                {{ strtoupper($lang) }}
            </button>
        </form>
        @if(!$loop->last)<span class="text-h-light/60">|</span>@endif
    @endforeach
</div>
```

---

#### 4.2 Dodanie przełącznika do nagłówków
- `welcome.blade.php` – desktop nav i mobile menu
- `privacy-policy.blade.php` – nagłówek strony

---

### ETAP 5 – Aktualizacja komponentu Livewire

#### 5.1 `app/Livewire/SubscribeForm.php`
- Właściwości `$messages` (walidacja) → zastąpić `__('ui.validation.*')`
- Stałe `CONSENT_MARKETING_TEXT` i `CONSENT_PRIVACY_TEXT`:
  - Zapisywać do bazy danych tekst w języku aktywnym w momencie wysyłki formularza
  - `__('ui.form.consent_marketing')` i `__('ui.form.consent_privacy_text')` przed zapisem do `$consentData`
  - Rozważyć zapis zarówno tekstu PL jak i EN (np. jako JSON lub osobne kolumny)

---

### ETAP 6 – SEO (opcjonalne ulepszenia)

#### 6.1 Hreflang w `<head>`
```html
<link rel="alternate" hreflang="pl" href="{{ url('/') }}" />
<link rel="alternate" hreflang="en" href="{{ url('/') }}" />
<link rel="alternate" hreflang="x-default" href="{{ url('/') }}" />
```

#### 6.2 Angielski alias dla polityki prywatności
```php
Route::view('/privacy-policy', 'privacy-policy')->name('privacy-policy.en');
```

---

### ETAP 7 – Testy

#### 7.1 Aktualizacja istniejących testów
- `tests/Feature/SubscribeFormTest.php` – sprawdzić, czy testy przechodzą z nową walidacją przez `__()`
- `tests/Feature/SubscriberTest.php` – sprawdzić

#### 7.2 Nowe testy do napisania
- `SetLocaleMiddlewareTest` – middleware poprawnie ustawia locale z sesji; fallback do `pl`
- `LocaleControllerTest` – przełączanie działa, zapis w sesji, niedozwolone locale → 404
- `SubscribeFormLocaleTest` – formularz wyświetla komunikaty błędów w języku aktywnym
- `WelcomeMailLocaleTest` – e-mail wysyłany jest w języku przypisanym do subskrybenta

---

### ETAP 8 – Finalizacja

- [ ] `vendor/bin/pint --dirty` na wszystkich zmodyfikowanych plikach PHP
- [ ] `php artisan test --compact` – wszystkie testy zielone
- [ ] Manualna weryfikacja PL i EN w przeglądarce
- [ ] Sprawdzenie podglądu e-maila w obu językach (np. przez Mailpit/Mailtrap)

---

## Kolejność implementacji (priorytet)

| # | Zadanie | Etap |
|---|---|---|
| 1 | Middleware `SetLocale` | 1.2 |
| 2 | Kontroler i trasa przełącznika języka | 1.3 |
| 3 | `lang/pl/ui.php` i `lang/en/ui.php` | 2.1, 2.2 |
| 4 | Komponent `language-switcher` + dodanie do nagłówków | 4.1, 4.2 |
| 5 | `welcome.blade.php` – klucze `__()` | 3.1 |
| 6 | `subscribe-form.blade.php` – klucze `__()` | 3.2 |
| 7 | `SubscribeForm.php` – walidacja i zgody przez `__()` | 5.1 |
| 8 | `privacy-policy.blade.php` – klucze `__()` | 3.3 |
| 9 | `WelcomeMail.php` – locale e-maila | 3.5 |
| 10 | Testy | 7.1, 7.2 |

---

## Pliki do stworzenia

| Plik | Opis |
|---|---|
| `app/Http/Middleware/SetLocale.php` | Middleware ustawiające locale z sesji |
| `app/Http/Controllers/LocaleController.php` | Kontroler przełączania języka |
| `lang/pl/ui.php` | Polskie tłumaczenia interfejsu |
| `lang/en/ui.php` | Angielskie tłumaczenia interfejsu |
| `resources/views/components/language-switcher.blade.php` | Komponent przełącznika PL/EN |

## Pliki do modyfikacji

| Plik | Zakres zmian |
|---|---|
| `config/app.php` | Potwierdzenie locale = 'pl' |
| `bootstrap/app.php` | Rejestracja middleware `SetLocale` |
| `routes/web.php` | Trasa `locale.switch` + opcjonalnie `/privacy-policy` |
| `welcome.blade.php` | Zastąpienie tekstu kluczami `__()`, dodanie switcher |
| `privacy-policy.blade.php` | Zastąpienie tekstu kluczami `__()`, dodanie switcher |
| `livewire/subscribe-form.blade.php` | Klucze `__()` dla formularza |
| `app/Livewire/SubscribeForm.php` | Walidacja i zgody przez `__()` |
| `app/Mail/WelcomeMail.php` | Metoda `locale()` dla subskrybenta |
| `tests/Feature/SubscribeFormTest.php` | Aktualizacja po zmianach |
