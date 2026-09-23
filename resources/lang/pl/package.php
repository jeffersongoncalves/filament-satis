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
        'credential' => 'Poświadczenie',
        'credential_url' => 'URL poświadczenia',
        'webhook_secret' => 'Sekret webhooka',
        'reference' => 'Referencja',
        'is_credentials_validated' => 'Zweryfikowane',
        'credentials_validated_at' => 'Zweryfikowano',
        'is_dev' => 'Deweloperski',
        'releases_count' => 'Wydania',
    ],
    'table' => [
        'credential' => 'Poświadczenie',
    ],
    'infolist' => [
        'composer_command' => 'Polecenie Composer',
        'webhook_url' => 'URL webhooka',
    ],
    'copy_message' => [
        'composer_command' => 'Polecenie Composer zostało skopiowane!',
        'webhook_url' => 'URL webhooka został skopiowany!',
        'webhook_secret' => 'Sekret webhooka został skopiowany!',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'Instrukcje',
            'content' => 'Wybierz poświadczenie do uwierzytelnienia w repozytorium.',
        ],
        'github' => [
            'label' => 'Instrukcje',
            'content' => 'Wybierz poświadczenie do uwierzytelnienia w GitHub.',
        ],
    ],
    'validation' => [
        'composer_name' => 'Nazwa musi być prawidłową nazwą pakietu Composer (vendor/package).',
        'github_name' => 'Nazwa musi być prawidłowym repozytorium GitHub (owner/repo).',
        'github_url' => 'URL musi być prawidłowym adresem SSH (git@github.com:user/repo.git).',
        'github_token' => 'Token musi być prawidłowym tokenem GitHub Personal Access Token (zaczynającym się od github_pat_).',
    ],
    'actions' => [
        'validate_credentials' => 'Zweryfikuj poświadczenia',
    ],
    'notifications' => [
        'credentials_valid' => 'Poświadczenia są prawidłowe.',
        'credentials_invalid' => 'Poświadczenia są nieprawidłowe.',
    ],
];
