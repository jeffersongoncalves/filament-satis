<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Navigation Group
    |--------------------------------------------------------------------------
    |
    | The navigation group shared by all Satis resources in the Filament panel.
    |
    */
    'navigation_group' => 'Satis',

    /*
    |--------------------------------------------------------------------------
    | Package Resource
    |--------------------------------------------------------------------------
    */
    'package_resource' => [
        'cluster' => null,
        'should_register_navigation' => true,
        'navigation_icon' => 'heroicon-o-cube',
        'navigation_sort' => 1,
        'slug' => 'satis/packages',
    ],

    /*
    |--------------------------------------------------------------------------
    | Token Resource
    |--------------------------------------------------------------------------
    */
    'token_resource' => [
        'cluster' => null,
        'should_register_navigation' => true,
        'navigation_icon' => 'heroicon-o-key',
        'navigation_sort' => 2,
        'slug' => 'satis/tokens',
    ],

    /*
    |--------------------------------------------------------------------------
    | Package Release Resource
    |--------------------------------------------------------------------------
    */
    'package_release_resource' => [
        'cluster' => null,
        'should_register_navigation' => true,
        'navigation_icon' => 'heroicon-o-tag',
        'navigation_sort' => 3,
        'slug' => 'satis/package-releases',
    ],

    /*
    |--------------------------------------------------------------------------
    | Package Download Resource
    |--------------------------------------------------------------------------
    */
    'package_download_resource' => [
        'cluster' => null,
        'should_register_navigation' => true,
        'navigation_icon' => 'heroicon-o-arrow-down-tray',
        'navigation_sort' => 4,
        'slug' => 'satis/package-downloads',
    ],

    /*
    |--------------------------------------------------------------------------
    | Dependency Resource
    |--------------------------------------------------------------------------
    */
    'dependency_resource' => [
        'cluster' => null,
        'should_register_navigation' => true,
        'navigation_icon' => 'heroicon-o-link',
        'navigation_sort' => 5,
        'slug' => 'satis/dependencies',
    ],
];
