<?php

return [
    'navigation_label' => 'Paquets',
    'model_label' => 'Paquet',
    'plural_model_label' => 'Paquets',
    'sections' => [
        'general' => 'Informations générales',
        'credentials' => 'Identifiants',
        'integration' => 'Intégration',
        'webhook' => 'Webhook',
        'package_release' => 'Dernière version',
        'dependencies' => 'Dépendances',
    ],
    'fields' => [
        'name' => 'Nom',
        'type' => 'Type',
        'is_dev' => 'Paquet de développement',
        'webhook_secret' => 'Secret du webhook',
        'reference' => 'Référence',
        'is_credentials_validated' => 'Validé',
        'credentials_validated_at' => 'Validé le',
    ],
    'infolist' => [
        'composer_command' => 'Commande Composer',
        'webhook_url' => 'URL du webhook',
        'credential' => 'Identifiant',
        'credential_url' => 'URL de l\'identifiant',
    ],
    'copy_message' => [
        'composer_command' => 'Commande Composer copiée avec succès !',
        'webhook_url' => 'URL du webhook copiée avec succès !',
        'webhook_secret' => 'Secret du webhook copié avec succès !',
    ],
    'form' => [
        'credential' => 'Identifiant',
    ],
    'table' => [
        'credential' => 'Identifiant',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'Instructions',
            'content' => 'Saisissez le nom du paquet au format vendor/package.',
        ],
        'github' => [
            'label' => 'Instructions',
            'content' => 'Saisissez le nom du dépôt au format owner/repo.',
        ],
    ],
    'validation' => [
        'composer_name' => 'Le nom doit être au format vendor/package (minuscules, alphanumérique).',
        'github_name' => 'Le nom doit être au format owner/repository.',
        'github_url' => 'L\'URL doit être une URL SSH valide (git@github.com:user/repo.git).',
        'github_token' => 'Le jeton doit être un Personal Access Token GitHub valide (commençant par github_pat_).',
    ],
    'actions' => [
        'validate_credentials' => 'Valider les identifiants',
    ],
    'notifications' => [
        'credentials_valid' => 'Identifiants validés avec succès.',
        'credentials_invalid' => 'La validation des identifiants a échoué.',
    ],
];
