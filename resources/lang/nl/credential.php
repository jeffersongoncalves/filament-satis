<?php

return [
    'navigation_label' => 'Inloggegevens',
    'model_label' => 'Inloggegeven',
    'plural_model_label' => 'Inloggegevens',
    'sections' => [
        'general' => 'Algemene informatie',
        'validation' => 'Validatie',
        'packages' => 'Pakketten',
    ],
    'form' => [
        'name' => 'Naam',
        'url' => 'URL',
        'email' => 'E-mail',
        'password' => 'Wachtwoord',
    ],
    'table' => [
        'name' => 'Naam',
        'is_validated' => 'Gevalideerd',
        'packages_count' => 'Pakketten',
        'url' => 'URL',
    ],
    'fields' => [
        'validated_at' => 'Gevalideerd op',
    ],
    'actions' => [
        'validate' => [
            'label' => 'Inloggegeven valideren',
            'success' => 'Inloggegeven is geldig.',
            'failed' => 'Validatie van inloggegeven mislukt.',
        ],
    ],
];
