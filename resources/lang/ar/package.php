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
        'is_dev' => 'حزمة تطوير',
        'webhook_secret' => 'مفتاح Webhook السري',
        'reference' => 'المرجع',
        'is_credentials_validated' => 'تم التحقق',
        'credentials_validated_at' => 'تاريخ التحقق',
    ],
    'infolist' => [
        'composer_command' => 'أمر Composer',
        'webhook_url' => 'رابط Webhook',
        'credential' => 'بيانات الاعتماد',
        'credential_url' => 'رابط بيانات الاعتماد',
    ],
    'copy_message' => [
        'composer_command' => 'تم نسخ أمر Composer بنجاح!',
        'webhook_url' => 'تم نسخ رابط Webhook بنجاح!',
        'webhook_secret' => 'تم نسخ مفتاح Webhook السري بنجاح!',
    ],
    'form' => [
        'credential' => 'بيانات الاعتماد',
    ],
    'table' => [
        'credential' => 'بيانات الاعتماد',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'التعليمات',
            'content' => 'أدخل اسم الحزمة بتنسيق vendor/package.',
        ],
        'github' => [
            'label' => 'التعليمات',
            'content' => 'أدخل اسم المستودع بتنسيق owner/repo.',
        ],
    ],
    'validation' => [
        'composer_name' => 'يجب أن يكون الاسم بتنسيق vendor/package (أحرف صغيرة وأرقام).',
        'github_name' => 'يجب أن يكون الاسم بتنسيق owner/repository.',
        'github_url' => 'يجب أن يكون الرابط رابط SSH صالحًا (git@github.com:user/repo.git).',
        'github_token' => 'يجب أن يكون الرمز رمز وصول شخصي صالحًا لـ GitHub (يبدأ بـ github_pat_).',
    ],
    'actions' => [
        'validate_credentials' => 'التحقق من بيانات الاعتماد',
    ],
    'notifications' => [
        'credentials_valid' => 'تم التحقق من بيانات الاعتماد بنجاح.',
        'credentials_invalid' => 'فشل التحقق من بيانات الاعتماد.',
    ],
];
