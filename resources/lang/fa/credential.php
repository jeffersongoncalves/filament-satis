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
        'email' => 'ایمیل / نام کاربری',
        'password' => 'رمز عبور / توکن',
    ],
    'fields' => [
        'validated_at' => 'زمان تأیید',
    ],
    'table' => [
        'name' => 'نام',
        'url' => 'URL',
        'is_validated' => 'تأییدشده',
        'packages_count' => 'بسته‌ها',
    ],
    'actions' => [
        'validate' => [
            'label' => 'اعتبارسنجی',
            'success' => 'اعتبارنامه با موفقیت تأیید شد.',
            'failed' => 'اعتبارسنجی اعتبارنامه ناموفق بود.',
        ],
    ],
];
