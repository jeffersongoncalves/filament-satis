<?php

return [
    'navigation_label' => 'Пакеты',
    'model_label' => 'Пакет',
    'plural_model_label' => 'Пакеты',
    'sections' => [
        'general' => 'Общая информация',
        'credentials' => 'Учётные данные',
        'integration' => 'Интеграция',
        'webhook' => 'Вебхук',
        'package_release' => 'Последний релиз',
        'dependencies' => 'Зависимости',
    ],
    'fields' => [
        'name' => 'Название',
        'type' => 'Тип',
        'is_dev' => 'Dev-пакет',
        'webhook_secret' => 'Секрет вебхука',
        'reference' => 'Ссылка',
        'is_credentials_validated' => 'Проверено',
        'credentials_validated_at' => 'Проверено',
    ],
    'infolist' => [
        'composer_command' => 'Команда Composer',
        'webhook_url' => 'URL вебхука',
        'credential' => 'Учётные данные',
        'credential_url' => 'URL учётных данных',
    ],
    'copy_message' => [
        'composer_command' => 'Команда Composer успешно скопирована!',
        'webhook_url' => 'URL вебхука успешно скопирован!',
        'webhook_secret' => 'Секрет вебхука успешно скопирован!',
    ],
    'form' => [
        'credential' => 'Учётные данные',
    ],
    'table' => [
        'credential' => 'Учётные данные',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'Инструкции',
            'content' => 'Введите имя пакета в формате vendor/package.',
        ],
        'github' => [
            'label' => 'Инструкции',
            'content' => 'Введите имя репозитория в формате owner/repo.',
        ],
    ],
    'validation' => [
        'composer_name' => 'Имя должно быть в формате vendor/package (строчные буквы и цифры).',
        'github_name' => 'Имя должно быть в формате owner/repository.',
        'github_url' => 'URL должен быть корректным SSH-адресом (git@github.com:user/repo.git).',
        'github_token' => 'Токен должен быть действительным GitHub Personal Access Token (начинающимся с github_pat_).',
    ],
    'actions' => [
        'validate_credentials' => 'Проверить учётные данные',
    ],
    'notifications' => [
        'credentials_valid' => 'Учётные данные успешно проверены.',
        'credentials_invalid' => 'Проверка учётных данных не пройдена.',
    ],
];
