<?php

return [
    'navigation_label' => 'Pacotes',
    'model_label' => 'Pacote',
    'plural_model_label' => 'Pacotes',

    'sections' => [
        'general' => 'Informações Gerais',
        'credentials' => 'Credenciais',
        'integration' => 'Integração',
        'webhook' => 'Webhook',
    ],

    'fields' => [
        'name' => 'Nome',
        'type' => 'Tipo',
        'url' => 'URL',
        'is_dev' => 'Pacote Dev',
        'username' => 'Usuário',
        'password' => 'Senha',
        'webhook_secret' => 'Webhook Secret',
        'reference' => 'Referência',
        'is_credentials_validated' => 'Validado',
        'credentials_validated_at' => 'Validado em',
    ],

    'validation' => [
        'composer_name' => 'O nome deve estar no formato vendor/package (minúsculo, alfanumérico).',
        'github_name' => 'O nome deve estar no formato owner/repository.',
    ],

    'actions' => [
        'validate_credentials' => 'Validar Credenciais',
    ],

    'notifications' => [
        'credentials_valid' => 'Credenciais validadas com sucesso.',
        'credentials_invalid' => 'Falha na validação das credenciais.',
    ],
];
