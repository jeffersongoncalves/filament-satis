<?php

return [
    'navigation_label' => 'パッケージ',
    'model_label' => 'パッケージ',
    'plural_model_label' => 'パッケージ',
    'sections' => [
        'general' => '基本情報',
        'credentials' => '認証情報',
        'integration' => '連携',
        'webhook' => 'Webhook',
        'package_release' => '最新リリース',
        'dependencies' => '依存関係',
    ],
    'fields' => [
        'name' => '名前',
        'type' => '種類',
        'credential' => '認証情報',
        'credential_url' => '認証情報 URL',
        'webhook_secret' => 'Webhook シークレット',
        'reference' => 'リファレンス',
        'is_credentials_validated' => '検証済み',
        'credentials_validated_at' => '検証日時',
        'is_dev' => '開発版',
        'releases_count' => 'リリース',
    ],
    'table' => [
        'credential' => '認証情報',
    ],
    'infolist' => [
        'composer_command' => 'Composer コマンド',
        'webhook_url' => 'Webhook URL',
    ],
    'copy_message' => [
        'composer_command' => 'Composer コマンドをコピーしました！',
        'webhook_url' => 'Webhook URL をコピーしました！',
        'webhook_secret' => 'Webhook シークレットをコピーしました！',
    ],
    'instructions' => [
        'composer' => [
            'label' => '説明',
            'content' => 'リポジトリの認証に使用する認証情報を選択してください。',
        ],
        'github' => [
            'label' => '説明',
            'content' => 'GitHub の認証に使用する認証情報を選択してください。',
        ],
    ],
    'validation' => [
        'composer_name' => '名前は有効な Composer パッケージ名（vendor/package）である必要があります。',
        'github_name' => '名前は有効な GitHub リポジトリ（owner/repo）である必要があります。',
        'github_url' => 'URL は有効な SSH URL（git@github.com:user/repo.git）である必要があります。',
        'github_token' => 'トークンは有効な GitHub Personal Access Token（github_pat_ で始まる）である必要があります。',
    ],
    'actions' => [
        'validate_credentials' => '認証情報を検証',
    ],
    'notifications' => [
        'credentials_valid' => '認証情報は有効です。',
        'credentials_invalid' => '認証情報が無効です。',
    ],
];
