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
        'credential' => 'Credencial',
        'credential_url' => 'URL da credencial',
        'webhook_secret' => 'Segredo do webhook',
        'reference' => 'Referência',
        'is_credentials_validated' => 'Validada',
        'credentials_validated_at' => 'Validada em',
        'is_dev' => 'Desenvolvimento',
        'releases_count' => 'Lançamentos',
    ],
    'table' => [
        'credential' => 'Credencial',
    ],
    'infolist' => [
        'composer_command' => 'Comando do Composer',
        'webhook_url' => 'URL do webhook',
    ],
    'copy_message' => [
        'composer_command' => 'Comando do Composer copiado com sucesso!',
        'webhook_url' => 'URL do webhook copiado com sucesso!',
        'webhook_secret' => 'Segredo do webhook copiado com sucesso!',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'Instruções',
            'content' => 'Selecione uma credencial para autenticar no repositório.',
        ],
        'github' => [
            'label' => 'Instruções',
            'content' => 'Selecione uma credencial para autenticar no GitHub.',
        ],
    ],
    'validation' => [
        'composer_name' => 'O nome deve ser um nome de pacote Composer válido (vendor/package).',
        'github_name' => 'O nome deve ser um repositório GitHub válido (owner/repo).',
        'github_url' => 'O URL deve ser um URL SSH válido (git@github.com:user/repo.git).',
        'github_token' => 'O token deve ser um Personal Access Token do GitHub válido (a começar por github_pat_).',
    ],
    'actions' => [
        'validate_credentials' => 'Validar credenciais',
    ],
    'notifications' => [
        'credentials_valid' => 'As credenciais são válidas.',
        'credentials_invalid' => 'As credenciais são inválidas.',
    ],
];
