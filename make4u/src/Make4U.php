<?php

namespace Make4U;

use Make4U\Framework\Container;
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
        $container = $this->service();
        $container->get('Test');
    }

    private function service(): Container
    {
        return Container::init([
            'ContainerTest' => Test\ContainerTest::class,
            'Test' => Test\Test::class,
            /*'Tet' => function () {
                return new Test\Test(new Test\ContainerTest);
            }*/
        ]);
    }

    public function run()
    {
        //return var_dump(PHP_SAPI);
        //obtener uri
    }
}
