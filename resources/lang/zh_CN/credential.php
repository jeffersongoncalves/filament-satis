<?php

return [
    'navigation_label' => '凭据',
    'model_label' => '凭据',
    'plural_model_label' => '凭据',
    'sections' => [
        'general' => '基本信息',
        'validation' => '验证',
        'packages' => '包',
    ],
    'form' => [
        'name' => '名称',
        'url' => 'URL',
        'email' => '邮箱',
        'password' => '密码',
    ],
    'table' => [
        'name' => '名称',
        'is_validated' => '已验证',
        'packages_count' => '包',
        'url' => 'URL',
    ],
    'fields' => [
        'validated_at' => '验证时间',
    ],
    'actions' => [
        'validate' => [
            'label' => '验证凭据',
            'success' => '凭据有效。',
            'failed' => '凭据验证失败。',
        ],
    ],
];
