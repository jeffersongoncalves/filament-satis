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
        'is_dev' => '開発版パッケージ',
        'webhook_secret' => 'Webhook シークレット',
        'reference' => 'リファレンス',
        'is_credentials_validated' => '検証済み',
        'credentials_validated_at' => '検証日時',
    ],
    'infolist' => [
        'composer_command' => 'Composer コマンド',
        'webhook_url' => 'Webhook URL',
        'credential' => '認証情報',
        'credential_url' => '認証情報 URL',
    ],
    'copy_message' => [
        'composer_command' => 'Composer コマンドをコピーしました！',
        'webhook_url' => 'Webhook URL をコピーしました！',
        'webhook_secret' => 'Webhook シークレットをコピーしました！',
    ],
    'form' => [
        'credential' => '認証情報',
    ],
    'table' => [
        'credential' => '認証情報',
    ],
    'instructions' => [
        'composer' => [
            'label' => '説明',
            'content' => 'パッケージ名を vendor/package 形式で入力してください。',
        ],
        'github' => [
            'label' => '説明',
            'content' => 'リポジトリ名を owner/repo 形式で入力してください。',
        ],
    ],
    'validation' => [
        'composer_name' => '名前は vendor/package 形式（小文字の英数字）である必要があります。',
        'github_name' => '名前は owner/repository 形式である必要があります。',
        'github_url' => 'URL は有効な SSH URL（git@github.com:user/repo.git）である必要があります。',
        'github_token' => 'トークンは有効な GitHub Personal Access Token（github_pat_ で始まる）である必要があります。',
    ],
    'actions' => [
        'validate_credentials' => '認証情報を検証',
    ],
    'notifications' => [
        'credentials_valid' => '認証情報を検証しました。',
        'credentials_invalid' => '認証情報の検証に失敗しました。',
    ],
];
