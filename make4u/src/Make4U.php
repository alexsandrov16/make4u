<?php

namespace Make4U;

use Make4U\Framework\Config;
use Make4U\Framework\File;
use Make4U\Framework\PHPFactory;
use Make4U\Framework\Traits\Singleton;

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
        Config::init(new PHPFactory);

        Service::class;

        Debug::class;

        Router::class;
    }

    public function run()
    {
        //return var_dump(PHP_SAPI);
        //obtener uri
    }
}
