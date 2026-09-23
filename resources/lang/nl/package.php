<?php

return [
    'navigation_label' => 'Pakketten',
    'model_label' => 'Pakket',
    'plural_model_label' => 'Pakketten',
    'sections' => [
        'general' => 'Algemene informatie',
        'credentials' => 'Inloggegevens',
        'integration' => 'Integratie',
        'webhook' => 'Webhook',
        'package_release' => 'Nieuwste release',
        'dependencies' => 'Afhankelijkheden',
    ],
    'fields' => [
        'name' => 'Naam',
        'type' => 'Type',
        'is_dev' => 'Dev-pakket',
        'webhook_secret' => 'Webhookgeheim',
        'reference' => 'Referentie',
        'is_credentials_validated' => 'Gevalideerd',
        'credentials_validated_at' => 'Gevalideerd op',
    ],
    'infolist' => [
        'composer_command' => 'Composer-opdracht',
        'webhook_url' => 'Webhook-URL',
        'credential' => 'Inloggegeven',
        'credential_url' => 'URL van inloggegeven',
    ],
    'copy_message' => [
        'composer_command' => 'Composer-opdracht succesvol gekopieerd!',
        'webhook_url' => 'Webhook-URL succesvol gekopieerd!',
        'webhook_secret' => 'Webhookgeheim succesvol gekopieerd!',
    ],
    'form' => [
        'credential' => 'Inloggegeven',
    ],
    'table' => [
        'credential' => 'Inloggegeven',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'Instructies',
            'content' => 'Voer de pakketnaam in het formaat vendor/package in.',
        ],
        'github' => [
            'label' => 'Instructies',
            'content' => 'Voer de repositorynaam in het formaat owner/repo in.',
        ],
    ],
    'validation' => [
        'composer_name' => 'De naam moet het formaat vendor/package hebben (kleine letters, alfanumeriek).',
        'github_name' => 'De naam moet het formaat owner/repository hebben.',
        'github_url' => 'De URL moet een geldige SSH-URL zijn (git@github.com:user/repo.git).',
        'github_token' => 'Het token moet een geldig GitHub Personal Access Token zijn (beginnend met github_pat_).',
    ],
    'actions' => [
        'validate_credentials' => 'Inloggegevens valideren',
    ],
    'notifications' => [
        'credentials_valid' => 'Inloggegevens succesvol gevalideerd.',
        'credentials_invalid' => 'Validatie van inloggegevens mislukt.',
    ],
];
