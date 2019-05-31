<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Admin Navigation Menu
    |--------------------------------------------------------------------------
    |
    | This array is for Navigation menus of the backend.  Just add/edit or
    | remove the elements from this array which will automatically change the
    | navigation.
    |
    */

    // SIDEBAR LAYOUT - MENU
    
    'sidebar' => [
        /*
            [
                'title' => 'Dashboard',
                'link' => '#',
                'active' => 'admin/dashboard*',
                'icon' => 'icon-fa icon-fa-dashboard'
            ],
        */
        [
            'title' => 'Users',
            'link' => 'admin/users',
            'active' => 'admin/users',
            'icon' => 'icon-fa icon-fa-user'
        ]/*,
        [
            'title' => 'Settings',
            'link' => '#',
            'active' => 'admin/settings*',
            'icon' => 'icon-fa icon-fa-cogs',
            'children' => [
                [
                    'title' => 'Social',
                    'link' => '/admin/settings/social',
                    'active' => 'admin/settings/social',
                ],
                [
                    'title' => 'Mail Driver',
                    'link' => 'admin/settings/mail',
                    'active' => 'admin/settings/mail*',
                ],
            ]
        ]*/
    ]    
];
