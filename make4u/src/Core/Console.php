<?php

namespace Make4U\Core;

use Make4U\Make4U;

defined('MAKE4U') || die;

/**
 * undocumented class
 */
class Console
{
    public function __construct()
    {

        //var_dump($_SERVER['argc']);
        //var_dump($_SERVER['argv']);

        if ($_SERVER['argv'][1] === '-v') {
            echo "Make4U v".Make4U::version.PHP_EOL;
            echo "License MIT\n";
        }
    }
}
