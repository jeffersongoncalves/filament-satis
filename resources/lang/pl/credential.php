<?php

return [
    'navigation_label' => 'Poświadczenia',
    'model_label' => 'Poświadczenie',
    'plural_model_label' => 'Poświadczenia',
    'sections' => [
        'general' => 'Informacje ogólne',
        'validation' => 'Weryfikacja',
        'packages' => 'Pakiety',
    ],
    'form' => [
        'name' => 'Nazwa',
        'url' => 'URL',
        'email' => 'E-mail / nazwa użytkownika',
        'password' => 'Hasło / token',
    ],
    'fields' => [
        'validated_at' => 'Zweryfikowano',
    ],
    'table' => [
        'name' => 'Nazwa',
        'url' => 'URL',
        'is_validated' => 'Zweryfikowane',
        'packages_count' => 'Pakiety',
    ],
    'actions' => [
        'validate' => [
            'label' => 'Zweryfikuj',
            'success' => 'Poświadczenie zostało zweryfikowane.',
            'failed' => 'Weryfikacja poświadczenia nie powiodła się.',
        ],
    ],
];
