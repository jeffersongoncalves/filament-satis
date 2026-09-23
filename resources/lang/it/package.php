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
        'is_dev' => 'Pacchetto di sviluppo',
        'webhook_secret' => 'Segreto del webhook',
        'reference' => 'Riferimento',
        'is_credentials_validated' => 'Convalidata',
        'credentials_validated_at' => 'Convalidata il',
    ],
    'infolist' => [
        'composer_command' => 'Comando Composer',
        'webhook_url' => 'URL del webhook',
        'credential' => 'Credenziale',
        'credential_url' => 'URL della credenziale',
    ],
    'copy_message' => [
        'composer_command' => 'Comando Composer copiato correttamente!',
        'webhook_url' => 'URL del webhook copiato correttamente!',
        'webhook_secret' => 'Segreto del webhook copiato correttamente!',
    ],
    'form' => [
        'credential' => 'Credenziale',
    ],
    'table' => [
        'credential' => 'Credenziale',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'Istruzioni',
            'content' => 'Inserisci il nome del pacchetto nel formato vendor/package.',
        ],
        'github' => [
            'label' => 'Istruzioni',
            'content' => 'Inserisci il nome del repository nel formato owner/repo.',
        ],
    ],
    'validation' => [
        'composer_name' => 'Il nome deve essere nel formato vendor/package (minuscolo, alfanumerico).',
        'github_name' => 'Il nome deve essere nel formato owner/repository.',
        'github_url' => 'L\'URL deve essere un URL SSH valido (git@github.com:user/repo.git).',
        'github_token' => 'Il token deve essere un Personal Access Token di GitHub valido (che inizia con github_pat_).',
    ],
    'actions' => [
        'validate_credentials' => 'Convalida credenziali',
    ],
    'notifications' => [
        'credentials_valid' => 'Credenziali convalidate correttamente.',
        'credentials_invalid' => 'Convalida delle credenziali non riuscita.',
    ],
];
