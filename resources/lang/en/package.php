<?php

return [
    'navigation_label' => 'Packages',
    'model_label' => 'Package',
    'plural_model_label' => 'Packages',

    'sections' => [
        'general' => 'General Information',
        'credentials' => 'Credentials',
        'integration' => 'Integration',
        'webhook' => 'Webhook',
        'package_release' => 'Latest Release',
        'dependencies' => 'Dependencies',
    ],

    'fields' => [
        'name' => 'Name',
        'type' => 'Type',
        'url' => 'URL',
        'is_dev' => 'Dev Package',
        'username' => 'Username',
        'password' => 'Password',
        'webhook_secret' => 'Webhook Secret',
        'reference' => 'Reference',
        'is_credentials_validated' => 'Validated',
        'credentials_validated_at' => 'Validated At',
    ],

    'infolist' => [
        'composer_command' => 'Composer Command',
        'webhook_url' => 'Webhook URL',
    ],

    'copy_message' => [
        'composer_command' => 'Composer command copied successfully!',
        'webhook_url' => 'Webhook URL copied successfully!',
        'webhook_secret' => 'Webhook secret copied successfully!',
    ],

    'validation' => [
        'composer_name' => 'The name must be in the format vendor/package (lowercase, alphanumeric).',
        'github_name' => 'The name must be in the format owner/repository.',
    ],

    'actions' => [
        'validate_credentials' => 'Validate Credentials',
    ],

    'notifications' => [
        'credentials_valid' => 'Credentials validated successfully.',
        'credentials_invalid' => 'Credentials validation failed.',
    ],
];
