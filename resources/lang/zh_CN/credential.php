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
        'email' => '邮箱 / 用户名',
        'password' => '密码 / 令牌',
    ],
    'fields' => [
        'validated_at' => '验证时间',
    ],
    'table' => [
        'name' => '名称',
        'url' => 'URL',
        'is_validated' => '已验证',
        'packages_count' => '包',
    ],
    'actions' => [
        'validate' => [
            'label' => '验证',
            'success' => '凭据验证成功。',
            'failed' => '凭据验证失败。',
        ],
    ],
];
