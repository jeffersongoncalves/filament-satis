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
        'credential' => 'Identifiant',
        'credential_url' => 'URL de l\'identifiant',
        'webhook_secret' => 'Secret du webhook',
        'reference' => 'Référence',
        'is_credentials_validated' => 'Validé',
        'credentials_validated_at' => 'Validé le',
        'is_dev' => 'Développement',
        'releases_count' => 'Versions',
    ],
    'table' => [
        'credential' => 'Identifiant',
    ],
    'infolist' => [
        'composer_command' => 'Commande Composer',
        'webhook_url' => 'URL du webhook',
    ],
    'copy_message' => [
        'composer_command' => 'Commande Composer copiée avec succès !',
        'webhook_url' => 'URL du webhook copiée avec succès !',
        'webhook_secret' => 'Secret du webhook copié avec succès !',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'Instructions',
            'content' => 'Sélectionnez un identifiant pour vous authentifier auprès du dépôt.',
        ],
        'github' => [
            'label' => 'Instructions',
            'content' => 'Sélectionnez un identifiant pour vous authentifier auprès de GitHub.',
        ],
    ],
    'validation' => [
        'composer_name' => 'Le nom doit être un nom de paquet Composer valide (vendor/package).',
        'github_name' => 'Le nom doit être un dépôt GitHub valide (owner/repo).',
        'github_url' => 'L\'URL doit être une URL SSH valide (git@github.com:user/repo.git).',
        'github_token' => 'Le jeton doit être un Personal Access Token GitHub valide (commençant par github_pat_).',
    ],
    'actions' => [
        'validate_credentials' => 'Valider les identifiants',
    ],
    'notifications' => [
        'credentials_valid' => 'Les identifiants sont valides.',
        'credentials_invalid' => 'Les identifiants sont invalides.',
    ],
];
