<?php

return [
    'navigation_label' => 'Pakiety',
    'model_label' => 'Pakiet',
    'plural_model_label' => 'Pakiety',
    'sections' => [
        'general' => 'Informacje ogólne',
        'credentials' => 'Poświadczenia',
        'integration' => 'Integracja',
        'webhook' => 'Webhook',
        'package_release' => 'Najnowsze wydanie',
        'dependencies' => 'Zależności',
    ],
    'fields' => [
        'name' => 'Nazwa',
        'type' => 'Typ',
        'is_dev' => 'Pakiet deweloperski',
        'webhook_secret' => 'Sekret webhooka',
        'reference' => 'Referencja',
        'is_credentials_validated' => 'Zweryfikowane',
        'credentials_validated_at' => 'Zweryfikowano',
    ],
    'infolist' => [
        'composer_command' => 'Polecenie Composer',
        'webhook_url' => 'URL webhooka',
        'credential' => 'Poświadczenie',
        'credential_url' => 'URL poświadczenia',
    ],
    'copy_message' => [
        'composer_command' => 'Polecenie Composer zostało skopiowane!',
        'webhook_url' => 'URL webhooka został skopiowany!',
        'webhook_secret' => 'Sekret webhooka został skopiowany!',
    ],
    'form' => [
        'credential' => 'Poświadczenie',
    ],
    'table' => [
        'credential' => 'Poświadczenie',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'Instrukcje',
            'content' => 'Wprowadź nazwę pakietu w formacie vendor/package.',
        ],
        'github' => [
            'label' => 'Instrukcje',
            'content' => 'Wprowadź nazwę repozytorium w formacie owner/repo.',
        ],
    ],
    'validation' => [
        'composer_name' => 'Nazwa musi mieć format vendor/package (małe litery, znaki alfanumeryczne).',
        'github_name' => 'Nazwa musi mieć format owner/repository.',
        'github_url' => 'URL musi być prawidłowym adresem SSH (git@github.com:user/repo.git).',
        'github_token' => 'Token musi być prawidłowym tokenem GitHub Personal Access Token (zaczynającym się od github_pat_).',
    ],
    'actions' => [
        'validate_credentials' => 'Zweryfikuj poświadczenia',
    ],
    'notifications' => [
        'credentials_valid' => 'Poświadczenia zostały zweryfikowane.',
        'credentials_invalid' => 'Weryfikacja poświadczeń nie powiodła się.',
    ],
];
