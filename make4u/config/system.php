<?php

defined('MAKE4U') || die;

return [
    'timezone' => '',
    'errors' => [
        'debug' => false,
        'log' => true
    ],
    'cache' => [
        'enable' => false,
        'lifetime' => 604800
    ],
    'session' => [
        'name' => 'make4u',
        'lifetime' => 1440,
        'httponly' => true,
    ]
];
