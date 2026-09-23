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
        'email' => 'E-Mail / Benutzername',
        'password' => 'Passwort / Token',
    ],
    'fields' => [
        'validated_at' => 'Validiert am',
    ],
    'table' => [
        'name' => 'Name',
        'url' => 'URL',
        'is_validated' => 'Validiert',
        'packages_count' => 'Pakete',
    ],
    'actions' => [
        'validate' => [
            'label' => 'Validieren',
            'success' => 'Zugangsdaten erfolgreich validiert.',
            'failed' => 'Validierung der Zugangsdaten fehlgeschlagen.',
        ],
    ],
];
