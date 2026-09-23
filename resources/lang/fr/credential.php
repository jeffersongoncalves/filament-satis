<?php

return [
    'navigation_label' => 'Identifiants',
    'model_label' => 'Identifiant',
    'plural_model_label' => 'Identifiants',
    'sections' => [
        'general' => 'Informations générales',
        'validation' => 'Validation',
        'packages' => 'Paquets',
    ],
    'form' => [
        'name' => 'Nom',
        'url' => 'URL',
        'email' => 'E-mail / Nom d\'utilisateur',
        'password' => 'Mot de passe / Jeton',
    ],
    'fields' => [
        'validated_at' => 'Validé le',
    ],
    'table' => [
        'name' => 'Nom',
        'url' => 'URL',
        'is_validated' => 'Validé',
        'packages_count' => 'Paquets',
    ],
    'actions' => [
        'validate' => [
            'label' => 'Valider',
            'success' => 'Identifiant validé avec succès.',
            'failed' => 'La validation de l\'identifiant a échoué.',
        ],
    ],
];
