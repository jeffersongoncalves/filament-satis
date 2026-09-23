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
        'email' => 'E-mail',
        'password' => 'Mot de passe',
    ],
    'table' => [
        'name' => 'Nom',
        'is_validated' => 'Validé',
        'packages_count' => 'Paquets',
        'url' => 'URL',
    ],
    'fields' => [
        'validated_at' => 'Validé le',
    ],
    'actions' => [
        'validate' => [
            'label' => 'Valider l\'identifiant',
            'success' => 'L\'identifiant est valide.',
            'failed' => 'La validation de l\'identifiant a échoué.',
        ],
    ],
];
