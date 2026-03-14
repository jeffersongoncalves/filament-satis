<?php

return [
    'navigation_label' => 'Credenciais',
    'model_label' => 'Credencial',
    'plural_model_label' => 'Credenciais',

    'sections' => [
        'general' => 'Informações Gerais',
        'validation' => 'Validação',
        'packages' => 'Pacotes',
    ],

    'form' => [
        'name' => 'Nome',
        'url' => 'URL',
        'email' => 'E-mail',
        'password' => 'Senha',
    ],

    'table' => [
        'name' => 'Nome',
        'is_validated' => 'Validado',
        'packages_count' => 'Pacotes',
        'url' => 'URL',
    ],

    'fields' => [
        'validated_at' => 'Validado em',
    ],

    'actions' => [
        'validate' => [
            'label' => 'Validar Credencial',
            'success' => 'Credencial é válida.',
            'failed' => 'Falha na validação da credencial.',
        ],
    ],
];
