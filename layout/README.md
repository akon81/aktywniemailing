# Strefa Premium — Lista Mailingowa

Landing page z listą oczekujących zbudowany na Laravel + Livewire + Tailwind CSS.

---

## Stack technologiczny

- **Laravel 11** — backend framework
- **Livewire 3** — reaktywny formularz bez pisania JS
- **Tailwind CSS 3** — stylowanie
- **MySQL** — baza danych subskrybentów
- **Laravel Mail** — email powitalny po zapisie

---

## Instalacja

### 1. Skopiuj pliki do swojego projektu Laravel

```
app/
  Livewire/SubscribeForm.php
  Mail/WelcomeMail.php
  Models/Subscriber.php

database/
  migrations/2024_01_01_000000_create_subscribers_table.php

resources/views/
  welcome.blade.php
  livewire/subscribe-form.blade.php
  emails/welcome.blade.php

routes/
  web.php
```

### 2. Zainstaluj Livewire (jeśli jeszcze nie masz)

```bash
composer require livewire/livewire
```

### 3. Uruchom migrację

```bash
php artisan migrate
```

### 4. Skonfiguruj mail w `.env`

```env
MAIL_MAILER=smtp
MAIL_HOST=twoj-serwer-smtp
MAIL_PORT=587
MAIL_USERNAME=twoj@email.pl
MAIL_PASSWORD=haslo
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=twoj@email.pl
MAIL_FROM_NAME="Strefa Premium"
```

Do testów lokalnych możesz użyć [Mailtrap](https://mailtrap.io) lub ustawić `MAIL_MAILER=log`.

### 5. Zbuduj assety

```bash
npm install
npm run dev   # lub npm run build na produkcji
```

### 6. Gotowe!

```bash
php artisan serve
```

Strona dostępna pod `http://localhost:8000`

---

## Struktura bazy danych

Tabela `subscribers`:

| Kolumna    | Typ          | Opis                             |
|------------|--------------|----------------------------------|
| id         | bigint PK    | Auto-increment                   |
| name       | varchar(100) | Imię subskrybentki               |
| email      | varchar(255) | Email (unikalny)                 |
| status     | varchar(20)  | `confirmed` po zapisaniu         |
| created_at | timestamp    | Data zapisu                      |
| updated_at | timestamp    | Data aktualizacji                |

---

## Dostosowanie tekstów

Wszystkie treści strony znajdują się w:
- `resources/views/welcome.blade.php` — główna strona
- `resources/views/emails/welcome.blade.php` — email powitalny

Znajdź i zamień placeholder copy na własne teksty.

---

## Personalizacja kolorów

W `welcome.blade.php` znajdź sekcję `:root { }` i zmień wartości zmiennych CSS:

```css
:root {
    --gold:       #c9a84c;  /* główny akcent złoty */
    --gold-light: #e8d5a3;
    --gold-dark:  #a8872e;
}
```

---

## Podgląd zapisanych osób (panel admina)

Aby szybko podejrzeć listę subskrybentów bez panelu admina, możesz dodać tymczasową trasę w `routes/web.php`:

```php
// UWAGA: usuń przed wdrożeniem na produkcję lub zabezpiecz middleware!
Route::get('/admin/subscribers', function () {
    return \App\Models\Subscriber::orderByDesc('created_at')->get();
})->middleware('auth');
```

---

## Kolejne kroki (opcjonalnie)

- [ ] Dodaj panel admina (np. Filament) do zarządzania listą
- [ ] Eksport CSV subskrybentów
- [ ] Integracja z Mailchimp / Brevo przez API
- [ ] Honeypot anti-spam na formularzu
- [ ] Kolejkowanie maili (`php artisan queue:work`)
