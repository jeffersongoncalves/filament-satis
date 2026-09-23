<?php

return [
    'navigation_label' => 'Kimlik bilgileri',
    'model_label' => 'Kimlik bilgisi',
    'plural_model_label' => 'Kimlik bilgileri',
    'sections' => [
        'general' => 'Genel bilgiler',
        'validation' => 'Doğrulama',
        'packages' => 'Paketler',
    ],
    'form' => [
        'name' => 'Ad',
        'url' => 'URL',
        'email' => 'E-posta / Kullanıcı adı',
        'password' => 'Parola / Token',
    ],
    'fields' => [
        'validated_at' => 'Doğrulanma tarihi',
    ],
    'table' => [
        'name' => 'Ad',
        'url' => 'URL',
        'is_validated' => 'Doğrulandı',
        'packages_count' => 'Paketler',
    ],
    'actions' => [
        'validate' => [
            'label' => 'Doğrula',
            'success' => 'Kimlik bilgisi başarıyla doğrulandı.',
            'failed' => 'Kimlik bilgisi doğrulaması başarısız oldu.',
        ],
    ],
];
