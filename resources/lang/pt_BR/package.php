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

    'infolist' => [
        'composer_command' => 'Comando Composer',
        'webhook_url' => 'URL do Webhook',
    ],

    'copy_message' => [
        'composer_command' => 'Comando Composer copiado com sucesso!',
        'webhook_url' => 'URL do Webhook copiada com sucesso!',
        'webhook_secret' => 'Webhook secret copiado com sucesso!',
    ],

    'form' => [
        'url' => [
            'composer' => 'URL do Repositório',
            'github' => 'URL SSH',
        ],
        'username' => [
            'composer' => 'Usuário',
            'github' => 'Usuário GitHub',
        ],
        'password' => [
            'composer' => 'Senha',
            'github' => 'Personal Access Token (PAT)',
        ],
    ],

    'instructions' => [
        'composer' => [
            'label' => 'Instruções',
            'content' => 'Informe a URL do repositório Composer e as credenciais de autenticação.',
        ],
        'github' => [
            'label' => 'Instruções',
            'content' => 'Use a URL SSH (git@github.com:user/repo.git) e um Personal Access Token (PAT) iniciando com github_pat_.',
        ],
    ],

    'validation' => [
        'composer_name' => 'O nome deve ser um nome de pacote Composer válido (vendor/package).',
        'github_name' => 'O nome deve ser um repositório GitHub válido (owner/repo).',
        'github_url' => 'A URL deve ser uma URL SSH válida (git@github.com:user/repo.git).',
        'github_token' => 'O token deve ser um GitHub Personal Access Token válido (iniciando com github_pat_).',
    ],

    'actions' => [
        'validate_credentials' => 'Validar Credenciais',
    ],

    'notifications' => [
        'credentials_valid' => 'Credenciais são válidas.',
        'credentials_invalid' => 'Credenciais são inválidas.',
    ],
];
