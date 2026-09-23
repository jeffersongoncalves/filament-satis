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
        'is_dev' => 'بسته توسعه',
        'webhook_secret' => 'کلید مخفی وب‌هوک',
        'reference' => 'مرجع',
        'is_credentials_validated' => 'تأییدشده',
        'credentials_validated_at' => 'زمان تأیید',
    ],
    'infolist' => [
        'composer_command' => 'دستور Composer',
        'webhook_url' => 'URL وب‌هوک',
        'credential' => 'اعتبارنامه',
        'credential_url' => 'URL اعتبارنامه',
    ],
    'copy_message' => [
        'composer_command' => 'دستور Composer با موفقیت کپی شد!',
        'webhook_url' => 'URL وب‌هوک با موفقیت کپی شد!',
        'webhook_secret' => 'کلید مخفی وب‌هوک با موفقیت کپی شد!',
    ],
    'form' => [
        'credential' => 'اعتبارنامه',
    ],
    'table' => [
        'credential' => 'اعتبارنامه',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'راهنما',
            'content' => 'نام بسته را در قالب vendor/package وارد کنید.',
        ],
        'github' => [
            'label' => 'راهنما',
            'content' => 'نام مخزن را در قالب owner/repo وارد کنید.',
        ],
    ],
    'validation' => [
        'composer_name' => 'نام باید در قالب vendor/package باشد (حروف کوچک و الفبایی-عددی).',
        'github_name' => 'نام باید در قالب owner/repository باشد.',
        'github_url' => 'URL باید یک آدرس SSH معتبر باشد (git@github.com:user/repo.git).',
        'github_token' => 'توکن باید یک Personal Access Token معتبر GitHub باشد (با github_pat_ شروع شود).',
    ],
    'actions' => [
        'validate_credentials' => 'اعتبارسنجی اعتبارنامه‌ها',
    ],
    'notifications' => [
        'credentials_valid' => 'اعتبارنامه‌ها با موفقیت تأیید شدند.',
        'credentials_invalid' => 'اعتبارسنجی اعتبارنامه‌ها ناموفق بود.',
    ],
];
