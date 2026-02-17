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
        'username' => 'Usuário',
        'password' => 'Senha',
        'webhook_secret' => 'Webhook Secret',
        'reference' => 'Referência',
        'is_credentials_validated' => 'Validado',
        'credentials_validated_at' => 'Validado em',
        'is_dev' => 'Desenvolvimento',
        'releases_count' => 'Releases',
    ],

    'validation' => [
        'composer_name' => 'O nome deve ser um nome de pacote Composer válido (vendor/package).',
        'github_name' => 'O nome deve ser um repositório GitHub válido (owner/repo).',
    ],

    'actions' => [
        'validate_credentials' => 'Validar Credenciais',
    ],

    'notifications' => [
        'credentials_valid' => 'Credenciais são válidas.',
        'credentials_invalid' => 'Credenciais são inválidas.',
    ],
];
