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
        'email' => 'Email',
        'password' => 'Password',
    ],

    'table' => [
        'name' => 'Name',
        'is_validated' => 'Validated',
        'packages_count' => 'Packages',
        'url' => 'URL',
    ],

    'fields' => [
        'validated_at' => 'Validated At',
    ],

    'actions' => [
        'validate' => [
            'label' => 'Validate Credential',
            'success' => 'Credential is valid.',
            'failed' => 'Credential validation failed.',
        ],
    ],
];
