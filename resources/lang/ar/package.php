<?php

return [
    'navigation_label' => 'الحزم',
    'model_label' => 'حزمة',
    'plural_model_label' => 'الحزم',
    'sections' => [
        'general' => 'معلومات عامة',
        'credentials' => 'بيانات الاعتماد',
        'integration' => 'التكامل',
        'webhook' => 'Webhook',
        'package_release' => 'أحدث إصدار',
        'dependencies' => 'الاعتماديات',
    ],
    'fields' => [
        'name' => 'الاسم',
        'type' => 'النوع',
        'credential' => 'بيانات الاعتماد',
        'credential_url' => 'رابط بيانات الاعتماد',
        'webhook_secret' => 'مفتاح Webhook السري',
        'reference' => 'المرجع',
        'is_credentials_validated' => 'تم التحقق',
        'credentials_validated_at' => 'تاريخ التحقق',
        'is_dev' => 'تطوير',
        'releases_count' => 'الإصدارات',
    ],
    'table' => [
        'credential' => 'بيانات الاعتماد',
    ],
    'infolist' => [
        'composer_command' => 'أمر Composer',
        'webhook_url' => 'رابط Webhook',
    ],
    'copy_message' => [
        'composer_command' => 'تم نسخ أمر Composer بنجاح!',
        'webhook_url' => 'تم نسخ رابط Webhook بنجاح!',
        'webhook_secret' => 'تم نسخ مفتاح Webhook السري بنجاح!',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'التعليمات',
            'content' => 'اختر بيانات اعتماد للمصادقة مع المستودع.',
        ],
        'github' => [
            'label' => 'التعليمات',
            'content' => 'اختر بيانات اعتماد للمصادقة مع GitHub.',
        ],
    ],
    'validation' => [
        'composer_name' => 'يجب أن يكون الاسم اسم حزمة Composer صالحًا (vendor/package).',
        'github_name' => 'يجب أن يكون الاسم مستودع GitHub صالحًا (owner/repo).',
        'github_url' => 'يجب أن يكون الرابط رابط SSH صالحًا (git@github.com:user/repo.git).',
        'github_token' => 'يجب أن يكون الرمز رمز وصول شخصي صالحًا لـ GitHub (يبدأ بـ github_pat_).',
    ],
    'actions' => [
        'validate_credentials' => 'التحقق من بيانات الاعتماد',
    ],
    'notifications' => [
        'credentials_valid' => 'بيانات الاعتماد صالحة.',
        'credentials_invalid' => 'بيانات الاعتماد غير صالحة.',
    ],
];
