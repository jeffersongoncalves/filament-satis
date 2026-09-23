<?php

return [
    'navigation_label' => 'Пакети',
    'model_label' => 'Пакет',
    'plural_model_label' => 'Пакети',
    'sections' => [
        'general' => 'Загальна інформація',
        'credentials' => 'Облікові дані',
        'integration' => 'Інтеграція',
        'webhook' => 'Вебхук',
        'package_release' => 'Останній реліз',
        'dependencies' => 'Залежності',
    ],
    'fields' => [
        'name' => 'Назва',
        'type' => 'Тип',
        'credential' => 'Облікові дані',
        'credential_url' => 'URL облікових даних',
        'webhook_secret' => 'Секрет вебхука',
        'reference' => 'Посилання',
        'is_credentials_validated' => 'Перевірено',
        'credentials_validated_at' => 'Перевірено',
        'is_dev' => 'Розробка',
        'releases_count' => 'Релізи',
    ],
    'table' => [
        'credential' => 'Облікові дані',
    ],
    'infolist' => [
        'composer_command' => 'Команда Composer',
        'webhook_url' => 'URL вебхука',
    ],
    'copy_message' => [
        'composer_command' => 'Команду Composer успішно скопійовано!',
        'webhook_url' => 'URL вебхука успішно скопійовано!',
        'webhook_secret' => 'Секрет вебхука успішно скопійовано!',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'Інструкції',
            'content' => 'Виберіть облікові дані для автентифікації в репозиторії.',
        ],
        'github' => [
            'label' => 'Інструкції',
            'content' => 'Виберіть облікові дані для автентифікації в GitHub.',
        ],
    ],
    'validation' => [
        'composer_name' => 'Назва має бути коректною назвою пакета Composer (vendor/package).',
        'github_name' => 'Назва має бути коректним репозиторієм GitHub (owner/repo).',
        'github_url' => 'URL має бути коректною SSH-адресою (git@github.com:user/repo.git).',
        'github_token' => 'Токен має бути дійсним GitHub Personal Access Token (що починається з github_pat_).',
    ],
    'actions' => [
        'validate_credentials' => 'Перевірити облікові дані',
    ],
    'notifications' => [
        'credentials_valid' => 'Облікові дані дійсні.',
        'credentials_invalid' => 'Облікові дані недійсні.',
    ],
];
