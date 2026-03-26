# Status projektu: aktywniemailing

Ostatnia aktualizacja: 2026-03-26
Testy: **59/59 ✅**

---

## ✅ Wdrożone

### SEO
- [x] `welcome.blade.php` – hreflang (`pl`/`en`) + `og:locale` w `<head>`

### Kolejka i maile
- [x] Wysyłanie maila powitalnego po zapisie – queue + job `SendWelcomeMail`
- [x] `emails/welcome.blade.php` – szablon e-maila z `__('mails.xxx')`
- [x] `lang/pl/mails.php` i `lang/en/mails.php` – tłumaczenia treści e-maila
- [x] `Subscriber::preferredLocale()` – Laravel automatycznie używa języka subskrybenta przy `Mail::to($subscriber)`

### Obsługa dwóch języków (PL/EN)
- [x] `config/app.php` – `locale = 'pl'`, `fallback_locale = 'pl'`
- [x] `app/Http/Middleware/SetLocale.php` – auto-detect via GeoIP, fallback z sesji
- [x] `bootstrap/app.php` – middleware zarejestrowane dla grupy `web`
- [x] `app/Http/Controllers/LocaleController.php` – przełączanie języka (POST)
- [x] `routes/web.php` – trasa `locale.switch` + alias `/privacy-policy`
- [x] `lang/pl/ui.php` – ~120 kluczy PL dla całego interfejsu
- [x] `lang/en/ui.php` – ~120 kluczy EN dla całego interfejsu
- [x] `resources/views/components/language-switcher.blade.php` – przełącznik PL | EN
- [x] `welcome.blade.php` – wszystkie teksty przez `__()`, `app()->getLocale()`, switcher w nav
- [x] `privacy-policy.blade.php` – wszystkie teksty przez `__()`, switcher w nagłówku
- [x] `livewire/subscribe-form.blade.php` – etykiety, placeholdery, zgody, sukces przez `__()`
- [x] `app/Livewire/SubscribeForm.php` – `rules()` i `messages()` jako metody (runtime `__()`)
- [x] Zgody zapisywane w języku aktywnym w momencie wysyłki formularza

### Testy
- [x] `tests/Feature/LocaleTest.php` – 7 testów (GeoIP, sesja, przełączanie, 404)
- [x] `tests/Feature/SubscribeFormTest.php` – zaktualizowane (kraj, język, zgody)
- [x] Naprawiony błąd: `email.php` → `mails.php` (Laravel zwracał cały plik jako array)
- [x] Wszystkie 59 testów przechodzi

---

## ❌ Do zrobienia

### Średni priorytet

- [x] **Weryfikacja manualna w przeglądarce** – sprawdzić PL i EN na żywo:
  - przełącznik działa w nagłówku
  - formularz wyświetla błędy walidacji w aktywnym języku
  - strona welcome.blade.php w obu językach poprawnie

- [x] **Podgląd e-maila powitalnego w obu językach** (Mailpit/Mailtrap)
  - czy `preferredLocale()` poprawnie ustawia język przed renderem
  - PL dla subskrybenta z `language = 'pl'`
  - EN dla subskrybenta z `language = 'en'`

### Niski priorytet / Opcjonalne

- [ ] **Angielska wersja polityki prywatności** – wymaga przeglądu prawnego przed wdrożeniem.
  Obecnie `/privacy-policy` wyświetla treść przetłumaczoną maszynowo (`lang/en/ui.php`).
  Przed produkcyjnym uruchomieniem EN należy sprawdzić tłumaczenie z prawnikiem.

- [ ] **Testy WelcomeMailLocaleTest** – weryfikacja, że e-mail wysyłany jest w języku subskrybenta
  ```php
  it('sends welcome mail in polish for PL subscriber', function () { ... });
  it('sends welcome mail in english for non-PL subscriber', function () { ... });
  ```

- [ ] **Pint na zmodyfikowanych plikach** – `vendor/bin/pint --dirty`

---

## Notatki techniczne

- `lang/pl/mails.php` i `lang/en/mails.php` – tłumaczenia szablonu e-mail (NIE `email.php` – Laravel traktowałby `__('Email')` jako odwołanie do całego pliku)
- `Subscriber` implementuje `HasLocalePreference` → `preferredLocale()` zwraca `$this->language` → Laravel auto-ustawia locale przy `Mail::to($subscriber)`
- Middleware `SetLocale` wywołuje `GeoIpService::detectLanguage()` tylko przy pierwszej wizycie (brak w sesji); przy kolejnych odczytuje z sesji
- `SubscribeForm::rules()` i `messages()` są metodami (nie właściwościami) – konieczne, żeby `__()` było wywołane w czasie żądania a nie przy inicjalizacji klasy
