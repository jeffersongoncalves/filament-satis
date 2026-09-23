<?php

return [
    'navigation_label' => '認証情報',
    'model_label' => '認証情報',
    'plural_model_label' => '認証情報',
    'sections' => [
        'general' => '基本情報',
        'validation' => '検証',
        'packages' => 'パッケージ',
    ],
    'form' => [
        'name' => '名前',
        'url' => 'URL',
        'email' => 'メール',
        'password' => 'パスワード',
    ],
    'table' => [
        'name' => '名前',
        'is_validated' => '検証済み',
        'packages_count' => 'パッケージ',
        'url' => 'URL',
    ],
    'fields' => [
        'validated_at' => '検証日時',
    ],
    'actions' => [
        'validate' => [
            'label' => '認証情報を検証',
            'success' => '認証情報は有効です。',
            'failed' => '認証情報の検証に失敗しました。',
        ],
    ],
];
