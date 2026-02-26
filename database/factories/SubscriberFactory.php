<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscriber>
 */
class SubscriberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'email' => fake()->unique()->safeEmail(),
            'status' => 'confirmed',
            'consent_marketing' => true,
            'consent_privacy' => true,
            'consent_marketing_at' => now(),
            'consent_privacy_at' => now(),
            'consent_ip' => fake()->ipv4(),
            'consent_marketing_text' => 'Wyrażam zgodę na otrzymywanie drogą elektroniczną informacji handlowych dotyczących usług i produktów marki „Aktywnie dla siebie", w tym informacji o starcie Strefy, materiałach edukacyjnych oraz ofertach specjalnych.',
            'consent_privacy_text' => 'Zapoznałam/-em się z Polityką Prywatności i akceptuję jej treść.',
        ];
    }
}
