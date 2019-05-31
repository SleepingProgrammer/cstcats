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
        [
            'title' => 'Profile',
            'link' => 'user/profile',
            'active' => 'user/profile',
            'icon' => 'icon-fa icon-fa-user'
        ],
        [
            'title' => 'Account Settings',
            'link' => 'user/account_settings',
            'active' => 'user/account_settings',
            'icon' => 'icon-fa icon-fa-cogs'
        ]
    ]
];
