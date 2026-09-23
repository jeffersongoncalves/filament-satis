<?php

return [
    'navigation_label' => 'Pacchetti',
    'model_label' => 'Pacchetto',
    'plural_model_label' => 'Pacchetti',
    'sections' => [
        'general' => 'Informazioni generali',
        'credentials' => 'Credenziali',
        'integration' => 'Integrazione',
        'webhook' => 'Webhook',
        'package_release' => 'Ultima release',
        'dependencies' => 'Dipendenze',
    ],
    'fields' => [
        'name' => 'Nome',
        'type' => 'Tipo',
        'credential' => 'Credenziale',
        'credential_url' => 'URL della credenziale',
        'webhook_secret' => 'Segreto del webhook',
        'reference' => 'Riferimento',
        'is_credentials_validated' => 'Convalidata',
        'credentials_validated_at' => 'Convalidata il',
        'is_dev' => 'Sviluppo',
        'releases_count' => 'Release',
    ],
    'table' => [
        'credential' => 'Credenziale',
    ],
    'infolist' => [
        'composer_command' => 'Comando Composer',
        'webhook_url' => 'URL del webhook',
    ],
    'copy_message' => [
        'composer_command' => 'Comando Composer copiato correttamente!',
        'webhook_url' => 'URL del webhook copiato correttamente!',
        'webhook_secret' => 'Segreto del webhook copiato correttamente!',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'Istruzioni',
            'content' => 'Seleziona una credenziale per autenticarti con il repository.',
        ],
        'github' => [
            'label' => 'Istruzioni',
            'content' => 'Seleziona una credenziale per autenticarti con GitHub.',
        ],
    ],
    'validation' => [
        'composer_name' => 'Il nome deve essere un nome di pacchetto Composer valido (vendor/package).',
        'github_name' => 'Il nome deve essere un repository GitHub valido (owner/repo).',
        'github_url' => 'L\'URL deve essere un URL SSH valido (git@github.com:user/repo.git).',
        'github_token' => 'Il token deve essere un Personal Access Token di GitHub valido (che inizia con github_pat_).',
    ],
    'actions' => [
        'validate_credentials' => 'Convalida credenziali',
    ],
    'notifications' => [
        'credentials_valid' => 'Le credenziali sono valide.',
        'credentials_invalid' => 'Le credenziali non sono valide.',
    ],
];
