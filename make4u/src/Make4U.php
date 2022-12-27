<?php

namespace Make4U;

use Make4U\Framework\Config;
use Make4U\Framework\Container;
use Make4U\Framework\Http\Uri;
use Make4U\Framework\Request;
use Make4U\Framework\Response;
use Make4U\Framework\Traits\Singleton;

defined('MAKE4U') || die;

/**
 * Crontolador Frontal
 */
class Make4U
{
    const version =  '0.1 alpha';

    use Singleton;

    protected function __construct() {
        /*$container = $this->service();

        Config::init($container->get('file'));*/
    }

    /*private function service():Container
    {
        return new Container([
            'file'=>'File::class'
        ]);
    }*/

    public function run()
    {
        //return var_dump(PHP_SAPI);
        //obtener uri
    }
}
