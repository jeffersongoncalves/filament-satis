<?php

return [
    'navigation_label' => '包',
    'model_label' => '包',
    'plural_model_label' => '包',
    'sections' => [
        'general' => '基本信息',
        'credentials' => '凭据',
        'integration' => '集成',
        'webhook' => 'Webhook',
        'package_release' => '最新发布',
        'dependencies' => '依赖',
    ],
    'fields' => [
        'name' => '名称',
        'type' => '类型',
        'credential' => '凭据',
        'credential_url' => '凭据 URL',
        'webhook_secret' => 'Webhook 密钥',
        'reference' => '引用',
        'is_credentials_validated' => '已验证',
        'credentials_validated_at' => '验证时间',
        'is_dev' => '开发',
        'releases_count' => '发布',
    ],
    'table' => [
        'credential' => '凭据',
    ],
    'infolist' => [
        'composer_command' => 'Composer 命令',
        'webhook_url' => 'Webhook URL',
    ],
    'copy_message' => [
        'composer_command' => 'Composer 命令复制成功！',
        'webhook_url' => 'Webhook URL 复制成功！',
        'webhook_secret' => 'Webhook 密钥复制成功！',
    ],
    'instructions' => [
        'composer' => [
            'label' => '说明',
            'content' => '选择用于仓库认证的凭据。',
        ],
        'github' => [
            'label' => '说明',
            'content' => '选择用于 GitHub 认证的凭据。',
        ],
    ],
    'validation' => [
        'composer_name' => '名称必须是有效的 Composer 包名（vendor/package）。',
        'github_name' => '名称必须是有效的 GitHub 仓库（owner/repo）。',
        'github_url' => 'URL 必须是有效的 SSH URL（git@github.com:user/repo.git）。',
        'github_token' => '令牌必须是有效的 GitHub Personal Access Token（以 github_pat_ 开头）。',
    ],
    'actions' => [
        'validate_credentials' => '验证凭据',
    ],
    'notifications' => [
        'credentials_valid' => '凭据有效。',
        'credentials_invalid' => '凭据无效。',
    ],
];
