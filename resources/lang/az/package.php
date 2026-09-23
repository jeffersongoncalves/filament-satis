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
        'is_dev' => 'Dev paketi',
        'webhook_secret' => 'Webhook gizli açarı',
        'reference' => 'İstinad',
        'is_credentials_validated' => 'Yoxlanılıb',
        'credentials_validated_at' => 'Yoxlama tarixi',
    ],
    'infolist' => [
        'composer_command' => 'Composer əmri',
        'webhook_url' => 'Webhook URL-i',
        'credential' => 'Etimadnamə',
        'credential_url' => 'Etimadnamə URL-i',
    ],
    'copy_message' => [
        'composer_command' => 'Composer əmri uğurla kopyalandı!',
        'webhook_url' => 'Webhook URL-i uğurla kopyalandı!',
        'webhook_secret' => 'Webhook gizli açarı uğurla kopyalandı!',
    ],
    'form' => [
        'credential' => 'Etimadnamə',
    ],
    'table' => [
        'credential' => 'Etimadnamə',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'Təlimat',
            'content' => 'Paket adını vendor/package formatında daxil edin.',
        ],
        'github' => [
            'label' => 'Təlimat',
            'content' => 'Repozitoriya adını owner/repo formatında daxil edin.',
        ],
    ],
    'validation' => [
        'composer_name' => 'Ad vendor/package formatında olmalıdır (kiçik hərflər, hərf-rəqəm).',
        'github_name' => 'Ad owner/repository formatında olmalıdır.',
        'github_url' => 'URL etibarlı SSH URL olmalıdır (git@github.com:user/repo.git).',
        'github_token' => 'Token etibarlı GitHub Personal Access Token olmalıdır (github_pat_ ilə başlayan).',
    ],
    'actions' => [
        'validate_credentials' => 'Etimadnamələri yoxla',
    ],
    'notifications' => [
        'credentials_valid' => 'Etimadnamələr uğurla yoxlanıldı.',
        'credentials_invalid' => 'Etimadnamələrin yoxlanması uğursuz oldu.',
    ],
];
