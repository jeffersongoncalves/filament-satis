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
        'email' => 'Email / Usuário',
        'password' => 'Senha / Token',
    ],

    'fields' => [
        'validated_at' => 'Validado em',
    ],

    'table' => [
        'name' => 'Nome',
        'url' => 'URL',
        'is_validated' => 'Validada',
        'packages_count' => 'Pacotes',
    ],

    'actions' => [
        'validate' => [
            'label' => 'Validar',
            'success' => 'Credencial validada com sucesso.',
            'failed' => 'Falha na validação da credencial.',
        ],
    ],
];
