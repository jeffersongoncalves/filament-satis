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
        'is_dev' => '开发包',
        'webhook_secret' => 'Webhook 密钥',
        'reference' => '引用',
        'is_credentials_validated' => '已验证',
        'credentials_validated_at' => '验证时间',
    ],
    'infolist' => [
        'composer_command' => 'Composer 命令',
        'webhook_url' => 'Webhook URL',
        'credential' => '凭据',
        'credential_url' => '凭据 URL',
    ],
    'copy_message' => [
        'composer_command' => 'Composer 命令复制成功！',
        'webhook_url' => 'Webhook URL 复制成功！',
        'webhook_secret' => 'Webhook 密钥复制成功！',
    ],
    'form' => [
        'credential' => '凭据',
    ],
    'table' => [
        'credential' => '凭据',
    ],
    'instructions' => [
        'composer' => [
            'label' => '说明',
            'content' => '请以 vendor/package 格式输入包名。',
        ],
        'github' => [
            'label' => '说明',
            'content' => '请以 owner/repo 格式输入仓库名。',
        ],
    ],
    'validation' => [
        'composer_name' => '名称必须为 vendor/package 格式（小写字母和数字）。',
        'github_name' => '名称必须为 owner/repository 格式。',
        'github_url' => 'URL 必须是有效的 SSH URL（git@github.com:user/repo.git）。',
        'github_token' => '令牌必须是有效的 GitHub Personal Access Token（以 github_pat_ 开头）。',
    ],
    'actions' => [
        'validate_credentials' => '验证凭据',
    ],
    'notifications' => [
        'credentials_valid' => '凭据验证成功。',
        'credentials_invalid' => '凭据验证失败。',
    ],
];
