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
        'package_release' => 'Última Release',
        'dependencies' => 'Dependências',
    ],

    'fields' => [
        'name' => 'Nome',
        'type' => 'Tipo',
        'is_dev' => 'Pacote Dev',
        'webhook_secret' => 'Webhook Secret',
        'reference' => 'Referência',
        'is_credentials_validated' => 'Validado',
        'credentials_validated_at' => 'Validado em',
    ],

    'infolist' => [
        'composer_command' => 'Comando Composer',
        'webhook_url' => 'URL do Webhook',
        'credential' => 'Credencial',
        'credential_url' => 'URL da Credencial',
    ],

    'copy_message' => [
        'composer_command' => 'Comando Composer copiado com sucesso!',
        'webhook_url' => 'URL do Webhook copiada com sucesso!',
        'webhook_secret' => 'Webhook secret copiado com sucesso!',
    ],

    'form' => [
        'credential' => 'Credencial',
    ],

    'table' => [
        'credential' => 'Credencial',
    ],

    'instructions' => [
        'composer' => [
            'label' => 'Instruções',
            'content' => 'Informe o nome do pacote no formato vendor/package.',
        ],
        'github' => [
            'label' => 'Instruções',
            'content' => 'Informe o nome do repositório no formato owner/repo.',
        ],
    ],

    'validation' => [
        'composer_name' => 'O nome deve estar no formato vendor/package (minúsculo, alfanumérico).',
        'github_name' => 'O nome deve estar no formato owner/repository.',
        'github_url' => 'A URL deve ser uma URL SSH válida (git@github.com:user/repo.git).',
        'github_token' => 'O token deve ser um GitHub Personal Access Token válido (iniciando com github_pat_).',
    ],

    'actions' => [
        'validate_credentials' => 'Validar Credenciais',
    ],

    'notifications' => [
        'credentials_valid' => 'Credenciais validadas com sucesso.',
        'credentials_invalid' => 'Falha na validação das credenciais.',
    ],
];
