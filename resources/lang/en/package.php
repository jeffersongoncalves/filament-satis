<?php

return [
    'navigation_label' => 'Packages',
    'model_label' => 'Package',
    'plural_model_label' => 'Packages',

    'sections' => [
        'general' => 'General Information',
        'credentials' => 'Credentials',
        'integration' => 'Integration',
    ],

    'fields' => [
        'name' => 'Name',
        'type' => 'Type',
        'url' => 'URL',
        'username' => 'Username',
        'password' => 'Password',
        'webhook_secret' => 'Webhook Secret',
        'reference' => 'Reference',
        'is_credentials_validated' => 'Validated',
        'credentials_validated_at' => 'Validated At',
    ],

    'type' => [
        'composer' => 'Composer',
        'github' => 'GitHub',
    ],
];
