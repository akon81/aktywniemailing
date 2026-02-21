<?php

namespace App\Livewire;

use App\Mail\WelcomeMail;
use App\Models\Subscriber;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class SubscribeForm extends Component
{
    public string $name = '';
    public string $email = '';
    public bool $submitted = false;
    public ?string $errorMessage = null;

    protected array $rules = [
        'name'  => 'required|min:2|max:100',
        'email' => 'required|email|max:255|unique:subscribers,email',
    ];

    protected array $messages = [
        'name.required'  => 'Imię jest wymagane.',
        'name.min'       => 'Imię musi mieć co najmniej 2 znaki.',
        'email.required' => 'Adres email jest wymagany.',
        'email.email'    => 'Podaj prawidłowy adres email.',
        'email.unique'   => 'Ten adres email jest już na liście. Do zobaczenia wkrótce! 🎉',
    ];

    public function submit(): void
    {
        $this->errorMessage = null;

        $this->validate();

        $subscriber = Subscriber::create([
            'name'   => $this->name,
            'email'  => $this->email,
            'status' => 'confirmed',
        ]);

        Mail::to($subscriber->email)->send(new WelcomeMail($subscriber));

        $this->submitted = true;
    }

    public function render()
    {
        return view('livewire.subscribe-form');
    }
}
