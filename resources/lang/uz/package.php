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
        'is_dev' => 'Dev paket',
        'webhook_secret' => 'Webhook maxfiy kaliti',
        'reference' => 'Havola',
        'is_credentials_validated' => 'Tekshirilgan',
        'credentials_validated_at' => 'Tekshirilgan vaqt',
    ],
    'infolist' => [
        'composer_command' => 'Composer buyrugʻi',
        'webhook_url' => 'Webhook URL',
        'credential' => 'Hisob maʼlumoti',
        'credential_url' => 'Hisob maʼlumoti URL',
    ],
    'copy_message' => [
        'composer_command' => 'Composer buyrugʻi muvaffaqiyatli nusxalandi!',
        'webhook_url' => 'Webhook URL muvaffaqiyatli nusxalandi!',
        'webhook_secret' => 'Webhook maxfiy kaliti muvaffaqiyatli nusxalandi!',
    ],
    'form' => [
        'credential' => 'Hisob maʼlumoti',
    ],
    'table' => [
        'credential' => 'Hisob maʼlumoti',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'Koʻrsatmalar',
            'content' => 'Paket nomini vendor/package formatida kiriting.',
        ],
        'github' => [
            'label' => 'Koʻrsatmalar',
            'content' => 'Repozitoriy nomini owner/repo formatida kiriting.',
        ],
    ],
    'validation' => [
        'composer_name' => 'Nom vendor/package formatida boʻlishi kerak (kichik harflar, harf-raqam).',
        'github_name' => 'Nom owner/repository formatida boʻlishi kerak.',
        'github_url' => 'URL yaroqli SSH URL boʻlishi kerak (git@github.com:user/repo.git).',
        'github_token' => 'Token yaroqli GitHub Personal Access Token boʻlishi kerak (github_pat_ bilan boshlanadigan).',
    ],
    'actions' => [
        'validate_credentials' => 'Hisob maʼlumotlarini tekshirish',
    ],
    'notifications' => [
        'credentials_valid' => 'Hisob maʼlumotlari muvaffaqiyatli tekshirildi.',
        'credentials_invalid' => 'Hisob maʼlumotlarini tekshirish muvaffaqiyatsiz tugadi.',
    ],
];
