<?php

return [

    'THEME' => env('THEME', 'pink'),
    'slider_path' => 'slider-cycle',
    'home_port_count' => 5,
    'home_articles_count' => 3,
    'paginate' => 5,
    'recent_comments' => 3,
    'recent_portfolios' => 3,
    'other_portfolios' => 6,
    'admin_email' => env('ADMIN_EMAIL', 'Nersesyan.V.A@Gmail.com'),
    'articles_img' => [
        'max' => ['width'=>816,'height'=>282],
        'mini'=> ['width'=>55,'height'=>55]
    ],
    'image' => [
        'width' => 1024,
        'height'=> 768,
    ],
    'portfolios_img' => [
        'max' => ['width'=>770,'height'=>368],
        'mini'=> ['width'=>175,'height'=>175],
    ],
    'slider_img' => [
        'width' => 1920,
        'height'=> 483,
    ],

];

