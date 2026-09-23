<?php

return [
    'navigation_label' => 'Paketler',
    'model_label' => 'Paket',
    'plural_model_label' => 'Paketler',
    'sections' => [
        'general' => 'Genel bilgiler',
        'credentials' => 'Kimlik bilgileri',
        'integration' => 'Entegrasyon',
        'webhook' => 'Webhook',
        'package_release' => 'Son yayın',
        'dependencies' => 'Bağımlılıklar',
    ],
    'fields' => [
        'name' => 'Ad',
        'type' => 'Tür',
        'credential' => 'Kimlik bilgisi',
        'credential_url' => 'Kimlik bilgisi URL\'si',
        'webhook_secret' => 'Webhook gizli anahtarı',
        'reference' => 'Referans',
        'is_credentials_validated' => 'Doğrulandı',
        'credentials_validated_at' => 'Doğrulanma tarihi',
        'is_dev' => 'Geliştirme',
        'releases_count' => 'Yayınlar',
    ],
    'table' => [
        'credential' => 'Kimlik bilgisi',
    ],
    'infolist' => [
        'composer_command' => 'Composer komutu',
        'webhook_url' => 'Webhook URL\'si',
    ],
    'copy_message' => [
        'composer_command' => 'Composer komutu başarıyla kopyalandı!',
        'webhook_url' => 'Webhook URL\'si başarıyla kopyalandı!',
        'webhook_secret' => 'Webhook gizli anahtarı başarıyla kopyalandı!',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'Talimatlar',
            'content' => 'Depo ile kimlik doğrulaması için bir kimlik bilgisi seçin.',
        ],
        'github' => [
            'label' => 'Talimatlar',
            'content' => 'GitHub ile kimlik doğrulaması için bir kimlik bilgisi seçin.',
        ],
    ],
    'validation' => [
        'composer_name' => 'Ad geçerli bir Composer paket adı olmalıdır (vendor/package).',
        'github_name' => 'Ad geçerli bir GitHub deposu olmalıdır (owner/repo).',
        'github_url' => 'URL geçerli bir SSH URL\'si olmalıdır (git@github.com:user/repo.git).',
        'github_token' => 'Token geçerli bir GitHub Personal Access Token olmalıdır (github_pat_ ile başlayan).',
    ],
    'actions' => [
        'validate_credentials' => 'Kimlik bilgilerini doğrula',
    ],
    'notifications' => [
        'credentials_valid' => 'Kimlik bilgileri geçerli.',
        'credentials_invalid' => 'Kimlik bilgileri geçersiz.',
    ],
];
