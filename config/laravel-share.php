<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Services
    |--------------------------------------------------------------------------
    |
    | Specify the base uri for each service.
    |
    |
    |
    */

    'services' => [
        'facebook' => [
            'uri' => 'https://www.facebook.com/sharer/sharer.php?u=',
            'text' => 'Поделиться'
        ],
        'twitter' => [
            'uri' => 'https://twitter.com/intent/tweet',
            'text' => 'Поделиться'
        ],
        'gplus' => [
            'uri' => 'https://plus.google.com/share?url=',
            'text' => 'Поделиться'
        ],
        'linkedin' => [
            'uri' => 'http://www.linkedin.com/shareArticle',
            'text' => 'Поделиться',
            'extra' => ['mini' => 'true']
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Font Awesome
    |--------------------------------------------------------------------------
    |
    | Specify the version of Font Awesome that you want to use.
    | We support version 4 and 5.
    |
    |
    */

    'fontAwesomeVersion' => 5,
];
