<?php

return [
    'navigation_label' => 'Credenciales',
    'model_label' => 'Credencial',
    'plural_model_label' => 'Credenciales',
    'sections' => [
        'general' => 'Información general',
        'validation' => 'Validación',
        'packages' => 'Paquetes',
    ],
    'form' => [
        'name' => 'Nombre',
        'url' => 'URL',
        'email' => 'Correo electrónico',
        'password' => 'Contraseña',
    ],
    'table' => [
        'name' => 'Nombre',
        'is_validated' => 'Validada',
        'packages_count' => 'Paquetes',
        'url' => 'URL',
    ],
    'fields' => [
        'validated_at' => 'Validada el',
    ],
    'actions' => [
        'validate' => [
            'label' => 'Validar credencial',
            'success' => 'La credencial es válida.',
            'failed' => 'La validación de la credencial falló.',
        ],
    ],
];
