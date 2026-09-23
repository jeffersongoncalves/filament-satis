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
        'email' => 'メール / ユーザー名',
        'password' => 'パスワード / トークン',
    ],
    'fields' => [
        'validated_at' => '検証日時',
    ],
    'table' => [
        'name' => '名前',
        'url' => 'URL',
        'is_validated' => '検証済み',
        'packages_count' => 'パッケージ',
    ],
    'actions' => [
        'validate' => [
            'label' => '検証',
            'success' => '認証情報を検証しました。',
            'failed' => '認証情報の検証に失敗しました。',
        ],
    ],
];
