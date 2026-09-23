<?php

return [
    'navigation_label' => 'اعتبارنامه‌ها',
    'model_label' => 'اعتبارنامه',
    'plural_model_label' => 'اعتبارنامه‌ها',
    'sections' => [
        'general' => 'اطلاعات عمومی',
        'validation' => 'اعتبارسنجی',
        'packages' => 'بسته‌ها',
    ],
    'form' => [
        'name' => 'نام',
        'url' => 'URL',
        'email' => 'ایمیل',
        'password' => 'رمز عبور',
    ],
    'table' => [
        'name' => 'نام',
        'is_validated' => 'تأییدشده',
        'packages_count' => 'بسته‌ها',
        'url' => 'URL',
    ],
    'fields' => [
        'validated_at' => 'زمان تأیید',
    ],
    'actions' => [
        'validate' => [
            'label' => 'اعتبارسنجی اعتبارنامه',
            'success' => 'اعتبارنامه معتبر است.',
            'failed' => 'اعتبارسنجی اعتبارنامه ناموفق بود.',
        ],
    ],
];
