<?php

return [
    'navigation_label' => 'Paketlər',
    'model_label' => 'Paket',
    'plural_model_label' => 'Paketlər',
    'sections' => [
        'general' => 'Ümumi məlumat',
        'credentials' => 'Etimadnamələr',
        'integration' => 'İnteqrasiya',
        'webhook' => 'Webhook',
        'package_release' => 'Son buraxılış',
        'dependencies' => 'Asılılıqlar',
    ],
    'fields' => [
        'name' => 'Ad',
        'type' => 'Növ',
        'credential' => 'Etimadnamə',
        'credential_url' => 'Etimadnamə URL-i',
        'webhook_secret' => 'Webhook gizli açarı',
        'reference' => 'İstinad',
        'is_credentials_validated' => 'Yoxlanılıb',
        'credentials_validated_at' => 'Yoxlama tarixi',
        'is_dev' => 'İnkişaf',
        'releases_count' => 'Buraxılışlar',
    ],
    'table' => [
        'credential' => 'Etimadnamə',
    ],
    'infolist' => [
        'composer_command' => 'Composer əmri',
        'webhook_url' => 'Webhook URL-i',
    ],
    'copy_message' => [
        'composer_command' => 'Composer əmri uğurla kopyalandı!',
        'webhook_url' => 'Webhook URL-i uğurla kopyalandı!',
        'webhook_secret' => 'Webhook gizli açarı uğurla kopyalandı!',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'Təlimat',
            'content' => 'Repozitoriya ilə autentifikasiya üçün etimadnamə seçin.',
        ],
        'github' => [
            'label' => 'Təlimat',
            'content' => 'GitHub ilə autentifikasiya üçün etimadnamə seçin.',
        ],
    ],
    'validation' => [
        'composer_name' => 'Ad etibarlı Composer paket adı olmalıdır (vendor/package).',
        'github_name' => 'Ad etibarlı GitHub repozitoriyası olmalıdır (owner/repo).',
        'github_url' => 'URL etibarlı SSH URL olmalıdır (git@github.com:user/repo.git).',
        'github_token' => 'Token etibarlı GitHub Personal Access Token olmalıdır (github_pat_ ilə başlayan).',
    ],
    'actions' => [
        'validate_credentials' => 'Etimadnamələri yoxla',
    ],
    'notifications' => [
        'credentials_valid' => 'Etimadnamələr etibarlıdır.',
        'credentials_invalid' => 'Etimadnamələr etibarsızdır.',
    ],
];
