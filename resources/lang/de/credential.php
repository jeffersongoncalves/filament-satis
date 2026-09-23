<?php

return [
    'navigation_label' => 'Zugangsdaten',
    'model_label' => 'Zugangsdaten',
    'plural_model_label' => 'Zugangsdaten',
    'sections' => [
        'general' => 'Allgemeine Informationen',
        'validation' => 'Validierung',
        'packages' => 'Pakete',
    ],
    'form' => [
        'name' => 'Name',
        'url' => 'URL',
        'email' => 'E-Mail',
        'password' => 'Passwort',
    ],
    'table' => [
        'name' => 'Name',
        'is_validated' => 'Validiert',
        'packages_count' => 'Pakete',
        'url' => 'URL',
    ],
    'fields' => [
        'validated_at' => 'Validiert am',
    ],
    'actions' => [
        'validate' => [
            'label' => 'Zugangsdaten validieren',
            'success' => 'Zugangsdaten sind gültig.',
            'failed' => 'Validierung der Zugangsdaten fehlgeschlagen.',
        ],
    ],
];
