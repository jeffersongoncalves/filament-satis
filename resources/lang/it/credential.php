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
        'email' => 'Email',
        'password' => 'Password',
    ],
    'table' => [
        'name' => 'Nome',
        'is_validated' => 'Convalidata',
        'packages_count' => 'Pacchetti',
        'url' => 'URL',
    ],
    'fields' => [
        'validated_at' => 'Convalidata il',
    ],
    'actions' => [
        'validate' => [
            'label' => 'Convalida credenziale',
            'success' => 'La credenziale è valida.',
            'failed' => 'Convalida della credenziale non riuscita.',
        ],
    ],
];
