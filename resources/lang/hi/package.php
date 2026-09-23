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
        'credential' => 'क्रेडेंशियल',
        'credential_url' => 'क्रेडेंशियल URL',
        'webhook_secret' => 'वेबहुक सीक्रेट',
        'reference' => 'संदर्भ',
        'is_credentials_validated' => 'सत्यापित',
        'credentials_validated_at' => 'सत्यापन समय',
        'is_dev' => 'डेवलपमेंट',
        'releases_count' => 'रिलीज़',
    ],
    'table' => [
        'credential' => 'क्रेडेंशियल',
    ],
    'infolist' => [
        'composer_command' => 'Composer कमांड',
        'webhook_url' => 'वेबहुक URL',
    ],
    'copy_message' => [
        'composer_command' => 'Composer कमांड सफलतापूर्वक कॉपी की गई!',
        'webhook_url' => 'वेबहुक URL सफलतापूर्वक कॉपी किया गया!',
        'webhook_secret' => 'वेबहुक सीक्रेट सफलतापूर्वक कॉपी किया गया!',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'निर्देश',
            'content' => 'रिपॉज़िटरी के साथ प्रमाणीकरण के लिए एक क्रेडेंशियल चुनें।',
        ],
        'github' => [
            'label' => 'निर्देश',
            'content' => 'GitHub के साथ प्रमाणीकरण के लिए एक क्रेडेंशियल चुनें।',
        ],
    ],
    'validation' => [
        'composer_name' => 'नाम एक मान्य Composer पैकेज नाम होना चाहिए (vendor/package)।',
        'github_name' => 'नाम एक मान्य GitHub रिपॉज़िटरी होना चाहिए (owner/repo)।',
        'github_url' => 'URL एक मान्य SSH URL होना चाहिए (git@github.com:user/repo.git)।',
        'github_token' => 'टोकन एक मान्य GitHub Personal Access Token होना चाहिए (github_pat_ से शुरू होने वाला)।',
    ],
    'actions' => [
        'validate_credentials' => 'क्रेडेंशियल सत्यापित करें',
    ],
    'notifications' => [
        'credentials_valid' => 'क्रेडेंशियल मान्य हैं।',
        'credentials_invalid' => 'क्रेडेंशियल अमान्य हैं।',
    ],
];
