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
        'is_dev' => 'Dev-Paket',
        'webhook_secret' => 'Webhook-Secret',
        'reference' => 'Referenz',
        'is_credentials_validated' => 'Validiert',
        'credentials_validated_at' => 'Validiert am',
    ],
    'infolist' => [
        'composer_command' => 'Composer-Befehl',
        'webhook_url' => 'Webhook-URL',
        'credential' => 'Zugangsdaten',
        'credential_url' => 'Zugangsdaten-URL',
    ],
    'copy_message' => [
        'composer_command' => 'Composer-Befehl erfolgreich kopiert!',
        'webhook_url' => 'Webhook-URL erfolgreich kopiert!',
        'webhook_secret' => 'Webhook-Secret erfolgreich kopiert!',
    ],
    'form' => [
        'credential' => 'Zugangsdaten',
    ],
    'table' => [
        'credential' => 'Zugangsdaten',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'Anleitung',
            'content' => 'Geben Sie den Paketnamen im Format vendor/package ein.',
        ],
        'github' => [
            'label' => 'Anleitung',
            'content' => 'Geben Sie den Repository-Namen im Format owner/repo ein.',
        ],
    ],
    'validation' => [
        'composer_name' => 'Der Name muss das Format vendor/package haben (Kleinbuchstaben, alphanumerisch).',
        'github_name' => 'Der Name muss das Format owner/repository haben.',
        'github_url' => 'Die URL muss eine gültige SSH-URL sein (git@github.com:user/repo.git).',
        'github_token' => 'Das Token muss ein gültiges GitHub Personal Access Token sein (beginnend mit github_pat_).',
    ],
    'actions' => [
        'validate_credentials' => 'Zugangsdaten validieren',
    ],
    'notifications' => [
        'credentials_valid' => 'Zugangsdaten erfolgreich validiert.',
        'credentials_invalid' => 'Validierung der Zugangsdaten fehlgeschlagen.',
    ],
];
