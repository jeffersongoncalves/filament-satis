<?php

return [
    'navigation_label' => 'Credenziali',
    'model_label' => 'Credenziale',
    'plural_model_label' => 'Credenziali',
    'sections' => [
        'general' => 'Informazioni generali',
        'validation' => 'Convalida',
        'packages' => 'Pacchetti',
    ],
    'form' => [
        'name' => 'Nome',
        'url' => 'URL',
        'email' => 'Email / Nome utente',
        'password' => 'Password / Token',
    ],
    'fields' => [
        'validated_at' => 'Convalidata il',
    ],
    'table' => [
        'name' => 'Nome',
        'url' => 'URL',
        'is_validated' => 'Convalidata',
        'packages_count' => 'Pacchetti',
    ],
    'actions' => [
        'validate' => [
            'label' => 'Convalida',
            'success' => 'Credenziale convalidata correttamente.',
            'failed' => 'Convalida della credenziale non riuscita.',
        ],
    ],
];
