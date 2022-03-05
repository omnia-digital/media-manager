<?php

return [

    'storage'    => [
        'disk' => 'public'
    ],

    'image' => [
        'allowed_file_types' => ['png', 'jpg', 'jpeg', 'gif'],

        /*
         * Max file size in KB.
         */
        'max_file_size'      => 5000,
    ],

    'unsplash' => [
        'access_key' => env('UNSPLASH_ACCESS_KEY'),

        'utm_source' => env('APP_NAME')
    ]

];
