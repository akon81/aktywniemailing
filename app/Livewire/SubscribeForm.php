<?php

namespace App\Livewire;

use App\Jobs\SendWelcomeMail;
use App\Models\Subscriber;
use Livewire\Component;

class SubscribeForm extends Component
{
    public const string CONSENT_MARKETING_TEXT = 'Wyrażam zgodę na otrzymywanie drogą elektroniczną informacji handlowych dotyczących usług i produktów marki „Aktywnie dla siebie", w tym informacji o starcie Strefy, materiałach edukacyjnych oraz ofertach specjalnych.';

    public const string CONSENT_PRIVACY_TEXT = 'Zapoznałam/-em się z Polityką Prywatności i akceptuję jej treść.';

    public string $name = '';

    public string $email = '';

    public bool $consentMarketing = false;

    public bool $consentPrivacy = false;

    public bool $submitted = false;

    public ?string $errorMessage = null;

    protected array $rules = [
        'name' => 'required|min:2|max:100',
        'email' => 'required|email|max:255|unique:subscribers,email,NULL,id,status,confirmed',
        'consentMarketing' => 'accepted',
        'consentPrivacy' => 'accepted',
    ];

    protected array $messages = [
        'name.required' => 'Imię jest wymagane.',
        'name.min' => 'Imię musi mieć co najmniej 2 znaki.',
        'email.required' => 'Adres email jest wymagany.',
        'email.email' => 'Podaj prawidłowy adres email.',
        'email.unique' => 'Ten adres email jest już na liście. Do zobaczenia wkrótce!',
        'consentMarketing.accepted' => 'Zgoda na komunikację marketingową jest wymagana.',
        'consentPrivacy.accepted' => 'Akceptacja Polityki Prywatności jest wymagana.',
    ];

    public function submit(): void
    {
        $this->errorMessage = null;

        $this->validate();

        $now = now();
        $ip = request()->ip();

        $consentData = [
            'name' => $this->name,
            'status' => 'confirmed',
            'consent_marketing' => true,
            'consent_privacy' => true,
            'consent_marketing_at' => $now,
            'consent_privacy_at' => $now,
            'consent_ip' => $ip,
            'consent_marketing_text' => self::CONSENT_MARKETING_TEXT,
            'consent_privacy_text' => self::CONSENT_PRIVACY_TEXT,
        ];

        $subscriber = Subscriber::where('email', $this->email)->first();

        if ($subscriber) {
            $subscriber->update($consentData);
        } else {
            $subscriber = Subscriber::create(array_merge($consentData, [
                'email' => $this->email,
            ]));
        }

        SendWelcomeMail::dispatch($subscriber);

        $this->submitted = true;
    }

    public function render()
    {
        return view('livewire.subscribe-form');
    }
}
