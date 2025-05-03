<?php

return [
    [
        'name' => 'Dashboard',
        'icon' => 'nav-icon bi bi-speedometer',
        'route' => 'dashboard.dashboard',
        'active' => 'dashboard.dashboard',
    ],
    [
        'name' => 'Categories',
        'icon' => 'bi bi-circle text-white nav-icon',
        'route' => 'dashboard.categories.index',
        'badge' => 'new',
        'active' => 'dashboard.categories.*',
    ],
    [
        'name' => 'Products',
        'icon' => 'bi bi-circle text-white nav-icon',
        'route' => 'dashboard.dashboard',
        'active' => 'dashboard.products.*',
    ]
];
