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
        'is_dev' => 'Dev-пакет',
        'webhook_secret' => 'Секрет вебхука',
        'reference' => 'Посилання',
        'is_credentials_validated' => 'Перевірено',
        'credentials_validated_at' => 'Перевірено',
    ],
    'infolist' => [
        'composer_command' => 'Команда Composer',
        'webhook_url' => 'URL вебхука',
        'credential' => 'Облікові дані',
        'credential_url' => 'URL облікових даних',
    ],
    'copy_message' => [
        'composer_command' => 'Команду Composer успішно скопійовано!',
        'webhook_url' => 'URL вебхука успішно скопійовано!',
        'webhook_secret' => 'Секрет вебхука успішно скопійовано!',
    ],
    'form' => [
        'credential' => 'Облікові дані',
    ],
    'table' => [
        'credential' => 'Облікові дані',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'Інструкції',
            'content' => 'Введіть назву пакета у форматі vendor/package.',
        ],
        'github' => [
            'label' => 'Інструкції',
            'content' => 'Введіть назву репозиторію у форматі owner/repo.',
        ],
    ],
    'validation' => [
        'composer_name' => 'Назва має бути у форматі vendor/package (малі літери та цифри).',
        'github_name' => 'Назва має бути у форматі owner/repository.',
        'github_url' => 'URL має бути коректною SSH-адресою (git@github.com:user/repo.git).',
        'github_token' => 'Токен має бути дійсним GitHub Personal Access Token (що починається з github_pat_).',
    ],
    'actions' => [
        'validate_credentials' => 'Перевірити облікові дані',
    ],
    'notifications' => [
        'credentials_valid' => 'Облікові дані успішно перевірено.',
        'credentials_invalid' => 'Перевірку облікових даних не пройдено.',
    ],
];
