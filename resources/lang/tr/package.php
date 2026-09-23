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
        'is_dev' => 'Geliştirme paketi',
        'webhook_secret' => 'Webhook gizli anahtarı',
        'reference' => 'Referans',
        'is_credentials_validated' => 'Doğrulandı',
        'credentials_validated_at' => 'Doğrulanma tarihi',
    ],
    'infolist' => [
        'composer_command' => 'Composer komutu',
        'webhook_url' => 'Webhook URL\'si',
        'credential' => 'Kimlik bilgisi',
        'credential_url' => 'Kimlik bilgisi URL\'si',
    ],
    'copy_message' => [
        'composer_command' => 'Composer komutu başarıyla kopyalandı!',
        'webhook_url' => 'Webhook URL\'si başarıyla kopyalandı!',
        'webhook_secret' => 'Webhook gizli anahtarı başarıyla kopyalandı!',
    ],
    'form' => [
        'credential' => 'Kimlik bilgisi',
    ],
    'table' => [
        'credential' => 'Kimlik bilgisi',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'Talimatlar',
            'content' => 'Paket adını vendor/package biçiminde girin.',
        ],
        'github' => [
            'label' => 'Talimatlar',
            'content' => 'Depo adını owner/repo biçiminde girin.',
        ],
    ],
    'validation' => [
        'composer_name' => 'Ad vendor/package biçiminde olmalıdır (küçük harf, alfanümerik).',
        'github_name' => 'Ad owner/repository biçiminde olmalıdır.',
        'github_url' => 'URL geçerli bir SSH URL\'si olmalıdır (git@github.com:user/repo.git).',
        'github_token' => 'Token geçerli bir GitHub Personal Access Token olmalıdır (github_pat_ ile başlayan).',
    ],
    'actions' => [
        'validate_credentials' => 'Kimlik bilgilerini doğrula',
    ],
    'notifications' => [
        'credentials_valid' => 'Kimlik bilgileri başarıyla doğrulandı.',
        'credentials_invalid' => 'Kimlik bilgileri doğrulaması başarısız oldu.',
    ],
];
