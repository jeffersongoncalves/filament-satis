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
        'credential' => 'Учётные данные',
        'credential_url' => 'URL учётных данных',
        'webhook_secret' => 'Секрет вебхука',
        'reference' => 'Ссылка',
        'is_credentials_validated' => 'Проверено',
        'credentials_validated_at' => 'Проверено',
        'is_dev' => 'Разработка',
        'releases_count' => 'Релизы',
    ],
    'table' => [
        'credential' => 'Учётные данные',
    ],
    'infolist' => [
        'composer_command' => 'Команда Composer',
        'webhook_url' => 'URL вебхука',
    ],
    'copy_message' => [
        'composer_command' => 'Команда Composer успешно скопирована!',
        'webhook_url' => 'URL вебхука успешно скопирован!',
        'webhook_secret' => 'Секрет вебхука успешно скопирован!',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'Инструкции',
            'content' => 'Выберите учётные данные для аутентификации в репозитории.',
        ],
        'github' => [
            'label' => 'Инструкции',
            'content' => 'Выберите учётные данные для аутентификации в GitHub.',
        ],
    ],
    'validation' => [
        'composer_name' => 'Имя должно быть корректным именем пакета Composer (vendor/package).',
        'github_name' => 'Имя должно быть корректным репозиторием GitHub (owner/repo).',
        'github_url' => 'URL должен быть корректным SSH-адресом (git@github.com:user/repo.git).',
        'github_token' => 'Токен должен быть действительным GitHub Personal Access Token (начинающимся с github_pat_).',
    ],
    'actions' => [
        'validate_credentials' => 'Проверить учётные данные',
    ],
    'notifications' => [
        'credentials_valid' => 'Учётные данные действительны.',
        'credentials_invalid' => 'Учётные данные недействительны.',
    ],
];
