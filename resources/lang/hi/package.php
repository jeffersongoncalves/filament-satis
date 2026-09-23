<?php

return [
    'navigation_label' => 'पैकेज',
    'model_label' => 'पैकेज',
    'plural_model_label' => 'पैकेज',
    'sections' => [
        'general' => 'सामान्य जानकारी',
        'credentials' => 'क्रेडेंशियल',
        'integration' => 'इंटीग्रेशन',
        'webhook' => 'वेबहुक',
        'package_release' => 'नवीनतम रिलीज़',
        'dependencies' => 'निर्भरताएँ',
    ],
    'fields' => [
        'name' => 'नाम',
        'type' => 'प्रकार',
        'is_dev' => 'डेव पैकेज',
        'webhook_secret' => 'वेबहुक सीक्रेट',
        'reference' => 'संदर्भ',
        'is_credentials_validated' => 'सत्यापित',
        'credentials_validated_at' => 'सत्यापन समय',
    ],
    'infolist' => [
        'composer_command' => 'Composer कमांड',
        'webhook_url' => 'वेबहुक URL',
        'credential' => 'क्रेडेंशियल',
        'credential_url' => 'क्रेडेंशियल URL',
    ],
    'copy_message' => [
        'composer_command' => 'Composer कमांड सफलतापूर्वक कॉपी की गई!',
        'webhook_url' => 'वेबहुक URL सफलतापूर्वक कॉपी किया गया!',
        'webhook_secret' => 'वेबहुक सीक्रेट सफलतापूर्वक कॉपी किया गया!',
    ],
    'form' => [
        'credential' => 'क्रेडेंशियल',
    ],
    'table' => [
        'credential' => 'क्रेडेंशियल',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'निर्देश',
            'content' => 'पैकेज का नाम vendor/package प्रारूप में दर्ज करें।',
        ],
        'github' => [
            'label' => 'निर्देश',
            'content' => 'रिपॉज़िटरी का नाम owner/repo प्रारूप में दर्ज करें।',
        ],
    ],
    'validation' => [
        'composer_name' => 'नाम vendor/package प्रारूप में होना चाहिए (छोटे अक्षर, अल्फ़ान्यूमेरिक)।',
        'github_name' => 'नाम owner/repository प्रारूप में होना चाहिए।',
        'github_url' => 'URL एक मान्य SSH URL होना चाहिए (git@github.com:user/repo.git)।',
        'github_token' => 'टोकन एक मान्य GitHub Personal Access Token होना चाहिए (github_pat_ से शुरू होने वाला)।',
    ],
    'actions' => [
        'validate_credentials' => 'क्रेडेंशियल सत्यापित करें',
    ],
    'notifications' => [
        'credentials_valid' => 'क्रेडेंशियल सफलतापूर्वक सत्यापित हुए।',
        'credentials_invalid' => 'क्रेडेंशियल सत्यापन विफल रहा।',
    ],
];
