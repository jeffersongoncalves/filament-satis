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
        'email' => 'E-mail / gebruikersnaam',
        'password' => 'Wachtwoord / token',
    ],
    'fields' => [
        'validated_at' => 'Gevalideerd op',
    ],
    'table' => [
        'name' => 'Naam',
        'url' => 'URL',
        'is_validated' => 'Gevalideerd',
        'packages_count' => 'Pakketten',
    ],
    'actions' => [
        'validate' => [
            'label' => 'Valideren',
            'success' => 'Inloggegeven succesvol gevalideerd.',
            'failed' => 'Validatie van inloggegeven mislukt.',
        ],
    ],
];
