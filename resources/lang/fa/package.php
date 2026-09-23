<?php

return [
    'navigation_label' => 'بسته‌ها',
    'model_label' => 'بسته',
    'plural_model_label' => 'بسته‌ها',
    'sections' => [
        'general' => 'اطلاعات عمومی',
        'credentials' => 'اعتبارنامه‌ها',
        'integration' => 'یکپارچه‌سازی',
        'webhook' => 'وب‌هوک',
        'package_release' => 'آخرین انتشار',
        'dependencies' => 'وابستگی‌ها',
    ],
    'fields' => [
        'name' => 'نام',
        'type' => 'نوع',
        'credential' => 'اعتبارنامه',
        'credential_url' => 'URL اعتبارنامه',
        'webhook_secret' => 'کلید مخفی وب‌هوک',
        'reference' => 'مرجع',
        'is_credentials_validated' => 'تأییدشده',
        'credentials_validated_at' => 'زمان تأیید',
        'is_dev' => 'توسعه',
        'releases_count' => 'انتشارها',
    ],
    'table' => [
        'credential' => 'اعتبارنامه',
    ],
    'infolist' => [
        'composer_command' => 'دستور Composer',
        'webhook_url' => 'URL وب‌هوک',
    ],
    'copy_message' => [
        'composer_command' => 'دستور Composer با موفقیت کپی شد!',
        'webhook_url' => 'URL وب‌هوک با موفقیت کپی شد!',
        'webhook_secret' => 'کلید مخفی وب‌هوک با موفقیت کپی شد!',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'راهنما',
            'content' => 'یک اعتبارنامه برای احراز هویت با مخزن انتخاب کنید.',
        ],
        'github' => [
            'label' => 'راهنما',
            'content' => 'یک اعتبارنامه برای احراز هویت با GitHub انتخاب کنید.',
        ],
    ],
    'validation' => [
        'composer_name' => 'نام باید یک نام بسته معتبر Composer باشد (vendor/package).',
        'github_name' => 'نام باید یک مخزن معتبر GitHub باشد (owner/repo).',
        'github_url' => 'URL باید یک آدرس SSH معتبر باشد (git@github.com:user/repo.git).',
        'github_token' => 'توکن باید یک Personal Access Token معتبر GitHub باشد (با github_pat_ شروع شود).',
    ],
    'actions' => [
        'validate_credentials' => 'اعتبارسنجی اعتبارنامه‌ها',
    ],
    'notifications' => [
        'credentials_valid' => 'اعتبارنامه‌ها معتبر هستند.',
        'credentials_invalid' => 'اعتبارنامه‌ها نامعتبر هستند.',
    ],
];
