<?php

return [
    'navigation_label' => 'Pacotes',
    'model_label' => 'Pacote',
    'plural_model_label' => 'Pacotes',
    'sections' => [
        'general' => 'Informações gerais',
        'credentials' => 'Credenciais',
        'integration' => 'Integração',
        'webhook' => 'Webhook',
        'package_release' => 'Último lançamento',
        'dependencies' => 'Dependências',
    ],
    'fields' => [
        'name' => 'Nome',
        'type' => 'Tipo',
        'is_dev' => 'Pacote de desenvolvimento',
        'webhook_secret' => 'Segredo do webhook',
        'reference' => 'Referência',
        'is_credentials_validated' => 'Validada',
        'credentials_validated_at' => 'Validada em',
    ],
    'infolist' => [
        'composer_command' => 'Comando do Composer',
        'webhook_url' => 'URL do webhook',
        'credential' => 'Credencial',
        'credential_url' => 'URL da credencial',
    ],
    'copy_message' => [
        'composer_command' => 'Comando do Composer copiado com sucesso!',
        'webhook_url' => 'URL do webhook copiado com sucesso!',
        'webhook_secret' => 'Segredo do webhook copiado com sucesso!',
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
            'content' => 'Introduza o nome do pacote no formato vendor/package.',
        ],
        'github' => [
            'label' => 'Instruções',
            'content' => 'Introduza o nome do repositório no formato owner/repo.',
        ],
    ],
    'validation' => [
        'composer_name' => 'O nome deve estar no formato vendor/package (minúsculas, alfanumérico).',
        'github_name' => 'O nome deve estar no formato owner/repository.',
        'github_url' => 'O URL deve ser um URL SSH válido (git@github.com:user/repo.git).',
        'github_token' => 'O token deve ser um Personal Access Token do GitHub válido (a começar por github_pat_).',
    ],
    'actions' => [
        'validate_credentials' => 'Validar credenciais',
    ],
    'notifications' => [
        'credentials_valid' => 'Credenciais validadas com sucesso.',
        'credentials_invalid' => 'A validação das credenciais falhou.',
    ],
];
