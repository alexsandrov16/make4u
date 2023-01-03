<?php

namespace Make4U;

use Make4U\Core\Traits\Singleton;

defined('MAKE4U') || die;

/**
 * Crontolador Frontal
 */
class Make4U
{
    const version =  '0.1 alpha';

    use Singleton;

    protected function __construct()
    {
        # code...
    }

    public function run()
    {
        //return var_dump(PHP_SAPI);
        //obtener uri
    }
}
