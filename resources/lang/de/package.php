<?php

return [
    'navigation_label' => 'Pakete',
    'model_label' => 'Paket',
    'plural_model_label' => 'Pakete',
    'sections' => [
        'general' => 'Allgemeine Informationen',
        'credentials' => 'Zugangsdaten',
        'integration' => 'Integration',
        'webhook' => 'Webhook',
        'package_release' => 'Neuestes Release',
        'dependencies' => 'Abhängigkeiten',
    ],
    'fields' => [
        'name' => 'Name',
        'type' => 'Typ',
        'credential' => 'Zugangsdaten',
        'credential_url' => 'Zugangsdaten-URL',
        'webhook_secret' => 'Webhook-Secret',
        'reference' => 'Referenz',
        'is_credentials_validated' => 'Validiert',
        'credentials_validated_at' => 'Validiert am',
        'is_dev' => 'Entwicklung',
        'releases_count' => 'Releases',
    ],
    'table' => [
        'credential' => 'Zugangsdaten',
    ],
    'infolist' => [
        'composer_command' => 'Composer-Befehl',
        'webhook_url' => 'Webhook-URL',
    ],
    'copy_message' => [
        'composer_command' => 'Composer-Befehl erfolgreich kopiert!',
        'webhook_url' => 'Webhook-URL erfolgreich kopiert!',
        'webhook_secret' => 'Webhook-Secret erfolgreich kopiert!',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'Anleitung',
            'content' => 'Wählen Sie Zugangsdaten zur Authentifizierung beim Repository.',
        ],
        'github' => [
            'label' => 'Anleitung',
            'content' => 'Wählen Sie Zugangsdaten zur Authentifizierung bei GitHub.',
        ],
    ],
    'validation' => [
        'composer_name' => 'Der Name muss ein gültiger Composer-Paketname sein (vendor/package).',
        'github_name' => 'Der Name muss ein gültiges GitHub-Repository sein (owner/repo).',
        'github_url' => 'Die URL muss eine gültige SSH-URL sein (git@github.com:user/repo.git).',
        'github_token' => 'Das Token muss ein gültiges GitHub Personal Access Token sein (beginnend mit github_pat_).',
    ],
    'actions' => [
        'validate_credentials' => 'Zugangsdaten validieren',
    ],
    'notifications' => [
        'credentials_valid' => 'Zugangsdaten sind gültig.',
        'credentials_invalid' => 'Zugangsdaten sind ungültig.',
    ],
];
