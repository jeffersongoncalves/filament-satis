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
        'username' => 'Username',
        'password' => 'Password',
        'webhook_secret' => 'Webhook Secret',
        'reference' => 'Reference',
        'is_credentials_validated' => 'Validated',
        'credentials_validated_at' => 'Validated At',
        'is_dev' => 'Development',
        'releases_count' => 'Releases',
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
        'composer_name' => 'The name must be a valid Composer package name (vendor/package).',
        'github_name' => 'The name must be a valid GitHub repository (owner/repo).',
    ],

    'actions' => [
        'validate_credentials' => 'Validate Credentials',
    ],

    'notifications' => [
        'credentials_valid' => 'Credentials are valid.',
        'credentials_invalid' => 'Credentials are invalid.',
    ],
];
