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
        'email' => 'Correo / Usuario',
        'password' => 'Contraseña / Token',
    ],
    'fields' => [
        'validated_at' => 'Validada el',
    ],
    'table' => [
        'name' => 'Nombre',
        'url' => 'URL',
        'is_validated' => 'Validada',
        'packages_count' => 'Paquetes',
    ],
    'actions' => [
        'validate' => [
            'label' => 'Validar',
            'success' => 'Credencial validada correctamente.',
            'failed' => 'La validación de la credencial falló.',
        ],
    ],
];
