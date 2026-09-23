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
        'credential' => 'Credencial',
        'credential_url' => 'URL de la credencial',
        'webhook_secret' => 'Secreto del webhook',
        'reference' => 'Referencia',
        'is_credentials_validated' => 'Validada',
        'credentials_validated_at' => 'Validada el',
        'is_dev' => 'Desarrollo',
        'releases_count' => 'Lanzamientos',
    ],
    'table' => [
        'credential' => 'Credencial',
    ],
    'infolist' => [
        'composer_command' => 'Comando de Composer',
        'webhook_url' => 'URL del webhook',
    ],
    'copy_message' => [
        'composer_command' => '¡Comando de Composer copiado correctamente!',
        'webhook_url' => '¡URL del webhook copiada correctamente!',
        'webhook_secret' => '¡Secreto del webhook copiado correctamente!',
    ],
    'instructions' => [
        'composer' => [
            'label' => 'Instrucciones',
            'content' => 'Selecciona una credencial para autenticarte en el repositorio.',
        ],
        'github' => [
            'label' => 'Instrucciones',
            'content' => 'Selecciona una credencial para autenticarte en GitHub.',
        ],
    ],
    'validation' => [
        'composer_name' => 'El nombre debe ser un nombre de paquete de Composer válido (vendor/package).',
        'github_name' => 'El nombre debe ser un repositorio de GitHub válido (owner/repo).',
        'github_url' => 'La URL debe ser una URL SSH válida (git@github.com:user/repo.git).',
        'github_token' => 'El token debe ser un Personal Access Token de GitHub válido (que empiece por github_pat_).',
    ],
    'actions' => [
        'validate_credentials' => 'Validar credenciales',
    ],
    'notifications' => [
        'credentials_valid' => 'Las credenciales son válidas.',
        'credentials_invalid' => 'Las credenciales no son válidas.',
    ],
];
