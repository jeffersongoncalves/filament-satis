<?php

return [
    'navigation_label' => 'Paquetes',
    'model_label' => 'Paquete',
    'plural_model_label' => 'Paquetes',
    'sections' => [
        'general' => 'Información general',
        'credentials' => 'Credenciales',
        'integration' => 'Integración',
        'webhook' => 'Webhook',
        'package_release' => 'Último lanzamiento',
        'dependencies' => 'Dependencias',
    ],
    'fields' => [
        'name' => 'Nombre',
        'type' => 'Tipo',
        'is_dev' => 'Paquete de desarrollo',
        'webhook_secret' => 'Secreto del webhook',
        'reference' => 'Referencia',
        'is_credentials_validated' => 'Validada',
        'credentials_validated_at' => 'Validada el',
    ],
    'infolist' => [
        'composer_command' => 'Comando de Composer',
        'webhook_url' => 'URL del webhook',
        'credential' => 'Credencial',
        'credential_url' => 'URL de la credencial',
    ],
    'copy_message' => [
        'composer_command' => '¡Comando de Composer copiado correctamente!',
        'webhook_url' => '¡URL del webhook copiada correctamente!',
        'webhook_secret' => '¡Secreto del webhook copiado correctamente!',
    ],
    'form' => [
        'credential' => 'Credencial',
    ],
    'table' => [
        'credential' => 'Credencial',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'Instrucciones',
            'content' => 'Introduce el nombre del paquete en formato vendor/package.',
        ],
        'github' => [
            'label' => 'Instrucciones',
            'content' => 'Introduce el nombre del repositorio en formato owner/repo.',
        ],
    ],
    'validation' => [
        'composer_name' => 'El nombre debe tener el formato vendor/package (minúsculas, alfanumérico).',
        'github_name' => 'El nombre debe tener el formato owner/repository.',
        'github_url' => 'La URL debe ser una URL SSH válida (git@github.com:user/repo.git).',
        'github_token' => 'El token debe ser un Personal Access Token de GitHub válido (que empiece por github_pat_).',
    ],
    'actions' => [
        'validate_credentials' => 'Validar credenciales',
    ],
    'notifications' => [
        'credentials_valid' => 'Credenciales validadas correctamente.',
        'credentials_invalid' => 'La validación de las credenciales falló.',
    ],
];
