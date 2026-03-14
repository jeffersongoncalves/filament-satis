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
        'is_dev' => 'Dev Package',
        'webhook_secret' => 'Webhook Secret',
        'reference' => 'Reference',
        'is_credentials_validated' => 'Validated',
        'credentials_validated_at' => 'Validated At',
    ],

    'infolist' => [
        'composer_command' => 'Composer Command',
        'webhook_url' => 'Webhook URL',
        'credential' => 'Credential',
        'credential_url' => 'Credential URL',
    ],

    'copy_message' => [
        'composer_command' => 'Composer command copied successfully!',
        'webhook_url' => 'Webhook URL copied successfully!',
        'webhook_secret' => 'Webhook secret copied successfully!',
    ],

    'form' => [
        'credential' => 'Credential',
    ],

    'table' => [
        'credential' => 'Credential',
    ],

    'instructions' => [
        'composer' => [
            'label' => 'Instructions',
            'content' => 'Enter the package name in the vendor/package format.',
        ],
        'github' => [
            'label' => 'Instructions',
            'content' => 'Enter the package name in the user/repo format.',
        ],
    ],

    'validation' => [
        'composer_name' => 'The name must be in the format vendor/package (lowercase, alphanumeric).',
        'github_name' => 'The name must be in the format owner/repository.',
        'github_url' => 'The URL must be a valid SSH URL (git@github.com:user/repo.git).',
        'github_token' => 'The token must be a valid GitHub Personal Access Token (starting with github_pat_).',
    ],

    'actions' => [
        'validate_credentials' => 'Validate Credentials',
    ],

    'notifications' => [
        'credentials_valid' => 'Credentials validated successfully.',
        'credentials_invalid' => 'Credentials validation failed.',
    ],
];
