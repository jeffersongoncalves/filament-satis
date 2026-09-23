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
        'email' => 'E-mail / Nome de utilizador',
        'password' => 'Palavra-passe / Token',
    ],
    'fields' => [
        'validated_at' => 'Validada em',
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
            'failed' => 'A validação da credencial falhou.',
        ],
    ],
];
