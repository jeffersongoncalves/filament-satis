<?php

return [
    'navigation_label' => 'Paketlar',
    'model_label' => 'Paket',
    'plural_model_label' => 'Paketlar',
    'sections' => [
        'general' => 'Umumiy maʼlumot',
        'credentials' => 'Hisob maʼlumotlari',
        'integration' => 'Integratsiya',
        'webhook' => 'Webhook',
        'package_release' => 'Soʻnggi reliz',
        'dependencies' => 'Bogʻliqliklar',
    ],
    'fields' => [
        'name' => 'Nomi',
        'type' => 'Turi',
        'credential' => 'Hisob maʼlumoti',
        'credential_url' => 'Hisob maʼlumoti URL',
        'webhook_secret' => 'Webhook maxfiy kaliti',
        'reference' => 'Havola',
        'is_credentials_validated' => 'Tekshirilgan',
        'credentials_validated_at' => 'Tekshirilgan vaqt',
        'is_dev' => 'Ishlab chiqish',
        'releases_count' => 'Relizlar',
    ],
    'table' => [
        'credential' => 'Hisob maʼlumoti',
    ],
    'infolist' => [
        'composer_command' => 'Composer buyrugʻi',
        'webhook_url' => 'Webhook URL',
    ],
    'copy_message' => [
        'composer_command' => 'Composer buyrugʻi muvaffaqiyatli nusxalandi!',
        'webhook_url' => 'Webhook URL muvaffaqiyatli nusxalandi!',
        'webhook_secret' => 'Webhook maxfiy kaliti muvaffaqiyatli nusxalandi!',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'Koʻrsatmalar',
            'content' => 'Repozitoriyda autentifikatsiya uchun hisob maʼlumotini tanlang.',
        ],
        'github' => [
            'label' => 'Koʻrsatmalar',
            'content' => 'GitHubʼda autentifikatsiya uchun hisob maʼlumotini tanlang.',
        ],
    ],
    'validation' => [
        'composer_name' => 'Nom yaroqli Composer paket nomi boʻlishi kerak (vendor/package).',
        'github_name' => 'Nom yaroqli GitHub repozitoriysi boʻlishi kerak (owner/repo).',
        'github_url' => 'URL yaroqli SSH URL boʻlishi kerak (git@github.com:user/repo.git).',
        'github_token' => 'Token yaroqli GitHub Personal Access Token boʻlishi kerak (github_pat_ bilan boshlanadigan).',
    ],
    'actions' => [
        'validate_credentials' => 'Hisob maʼlumotlarini tekshirish',
    ],
    'notifications' => [
        'credentials_valid' => 'Hisob maʼlumotlari yaroqli.',
        'credentials_invalid' => 'Hisob maʼlumotlari yaroqsiz.',
    ],
];
