<?php

namespace App\Livewire;

use App\Jobs\SendWelcomeMail;
use App\Models\Subscriber;
use App\Services\GeoIpService;
use Livewire\Component;

class SubscribeForm extends Component
{
    public string $name = '';

    public string $email = '';

    public bool $consentMarketing = false;

    public bool $consentPrivacy = false;

    public bool $submitted = false;

    public ?string $errorMessage = null;

    protected function rules(): array
    {
        return [
            'name' => 'required|min:2|max:100',
            'email' => 'required|email|max:255|unique:subscribers,email,NULL,id,status,confirmed',
            'consentMarketing' => 'accepted',
            'consentPrivacy' => 'accepted',
        ];
    }

    protected function messages(): array
    {
        return [
            'name.required' => __('ui.validation_name_required'),
            'name.min' => __('ui.validation_name_min'),
            'email.required' => __('ui.validation_email_required'),
            'email.email' => __('ui.validation_email_invalid'),
            'email.unique' => __('ui.validation_email_unique'),
            'consentMarketing.accepted' => __('ui.validation_consent_marketing'),
            'consentPrivacy.accepted' => __('ui.validation_consent_privacy'),
        ];
    }

    public function submit(GeoIpService $geoIp): void
    {
        $this->errorMessage = null;

        $this->validate();

        $now = now();
        $ip = request()->ip();
        $countryCode = $geoIp->detectCountryCode($ip);
        $language = session('locale') ?? (($countryCode !== null && $countryCode !== 'PL') ? 'en' : 'pl');

        $consentData = [
            'name' => $this->name,
            'status' => 'confirmed',
            'consent_marketing' => true,
            'consent_privacy' => true,
            'consent_marketing_at' => $now,
            'consent_privacy_at' => $now,
            'consent_ip' => $ip,
            'consent_marketing_text' => __('ui.form_consent_marketing'),
            'consent_privacy_text' => __('ui.form_consent_privacy', ['link' => __('ui.form_privacy_link_text')]),
            'country_code' => $countryCode,
            'language' => $language,
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

    public function render(): \Illuminate\View\View
    {
        return view('livewire.subscribe-form');
    }
}
