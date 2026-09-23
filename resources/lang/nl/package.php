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
        'credential' => 'Inloggegeven',
        'credential_url' => 'URL van inloggegeven',
        'webhook_secret' => 'Webhookgeheim',
        'reference' => 'Referentie',
        'is_credentials_validated' => 'Gevalideerd',
        'credentials_validated_at' => 'Gevalideerd op',
        'is_dev' => 'Ontwikkeling',
        'releases_count' => 'Releases',
    ],
    'table' => [
        'credential' => 'Inloggegeven',
    ],
    'infolist' => [
        'composer_command' => 'Composer-opdracht',
        'webhook_url' => 'Webhook-URL',
    ],
    'copy_message' => [
        'composer_command' => 'Composer-opdracht succesvol gekopieerd!',
        'webhook_url' => 'Webhook-URL succesvol gekopieerd!',
        'webhook_secret' => 'Webhookgeheim succesvol gekopieerd!',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'Instructies',
            'content' => 'Selecteer een inloggegeven om te authenticeren bij de repository.',
        ],
        'github' => [
            'label' => 'Instructies',
            'content' => 'Selecteer een inloggegeven om te authenticeren bij GitHub.',
        ],
    ],
    'validation' => [
        'composer_name' => 'De naam moet een geldige Composer-pakketnaam zijn (vendor/package).',
        'github_name' => 'De naam moet een geldige GitHub-repository zijn (owner/repo).',
        'github_url' => 'De URL moet een geldige SSH-URL zijn (git@github.com:user/repo.git).',
        'github_token' => 'Het token moet een geldig GitHub Personal Access Token zijn (beginnend met github_pat_).',
    ],
    'actions' => [
        'validate_credentials' => 'Inloggegevens valideren',
    ],
    'notifications' => [
        'credentials_valid' => 'Inloggegevens zijn geldig.',
        'credentials_invalid' => 'Inloggegevens zijn ongeldig.',
    ],
];
