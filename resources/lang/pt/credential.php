<?php

return [
    'navigation_label' => 'Credenciais',
    'model_label' => 'Credencial',
    'plural_model_label' => 'Credenciais',
    'sections' => [
        'general' => 'Informações gerais',
        'validation' => 'Validação',
        'packages' => 'Pacotes',
    ],
    'form' => [
        'name' => 'Nome',
        'url' => 'URL',
        'email' => 'E-mail',
        'password' => 'Palavra-passe',
    ],
    'table' => [
        'name' => 'Nome',
        'is_validated' => 'Validada',
        'packages_count' => 'Pacotes',
        'url' => 'URL',
    ],
    'fields' => [
        'validated_at' => 'Validada em',
    ],
    'actions' => [
        'validate' => [
            'label' => 'Validar credencial',
            'success' => 'A credencial é válida.',
            'failed' => 'A validação da credencial falhou.',
        ],
    ],
];
