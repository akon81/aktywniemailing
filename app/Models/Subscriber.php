<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'status',
        'consent_marketing',
        'consent_privacy',
        'consent_marketing_at',
        'consent_privacy_at',
        'consent_ip',
        'consent_marketing_text',
        'consent_privacy_text',
    ];

    protected function casts(): array
    {
        return [
            'consent_marketing' => 'boolean',
            'consent_privacy' => 'boolean',
            'consent_marketing_at' => 'datetime',
            'consent_privacy_at' => 'datetime',
        ];
    }
}
