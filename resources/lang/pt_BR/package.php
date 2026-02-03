<?php

return [
    'navigation_label' => 'Pacotes',
    'model_label' => 'Pacote',
    'plural_model_label' => 'Pacotes',

    'sections' => [
        'general' => 'Informacoes Gerais',
        'credentials' => 'Credenciais',
        'integration' => 'Integracao',
    ],

    'fields' => [
        'name' => 'Nome',
        'type' => 'Tipo',
        'url' => 'URL',
        'username' => 'Usuario',
        'password' => 'Senha',
        'webhook_secret' => 'Webhook Secret',
        'reference' => 'Referencia',
        'is_credentials_validated' => 'Validado',
        'credentials_validated_at' => 'Validado em',
    ],

    'type' => [
        'composer' => 'Composer',
        'github' => 'GitHub',
    ],
];
