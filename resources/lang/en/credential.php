<?php

return [
    'navigation_label' => 'Credentials',
    'model_label' => 'Credential',
    'plural_model_label' => 'Credentials',

    'sections' => [
        'general' => 'General Information',
        'validation' => 'Validation',
        'packages' => 'Packages',
    ],

    'form' => [
        'name' => 'Name',
        'url' => 'URL',
        'email' => 'Email / Username',
        'password' => 'Password / Token',
    ],

    'fields' => [
        'validated_at' => 'Validated At',
    ],

    'table' => [
        'name' => 'Name',
        'url' => 'URL',
        'is_validated' => 'Validated',
        'packages_count' => 'Packages',
    ],

    'actions' => [
        'validate' => [
            'label' => 'Validate',
            'success' => 'Credential validated successfully.',
            'failed' => 'Credential validation failed.',
        ],
    ],
];
