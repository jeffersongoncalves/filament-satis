<?php

return [
    'navigation_label' => 'بيانات الاعتماد',
    'model_label' => 'بيانات اعتماد',
    'plural_model_label' => 'بيانات الاعتماد',
    'sections' => [
        'general' => 'معلومات عامة',
        'validation' => 'التحقق',
        'packages' => 'الحزم',
    ],
    'form' => [
        'name' => 'الاسم',
        'url' => 'الرابط',
        'email' => 'البريد الإلكتروني / اسم المستخدم',
        'password' => 'كلمة المرور / الرمز',
    ],
    'fields' => [
        'validated_at' => 'تاريخ التحقق',
    ],
    'table' => [
        'name' => 'الاسم',
        'url' => 'الرابط',
        'is_validated' => 'تم التحقق',
        'packages_count' => 'الحزم',
    ],
    'actions' => [
        'validate' => [
            'label' => 'تحقق',
            'success' => 'تم التحقق من بيانات الاعتماد بنجاح.',
            'failed' => 'فشل التحقق من بيانات الاعتماد.',
        ],
    ],
];
