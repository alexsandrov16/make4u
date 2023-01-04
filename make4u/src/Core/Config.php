<?php

namespace Make4U\Core;

use Make4U\Core\Traits\Singleton;

defined('MAKE4U') || die;

/**
 * undocumented class
 */
class Config
{
    use Singleton;

    protected function __construct() {
        # code...
    }

    public function load(string $file)
    {
        # code...
    }

    public function set(string $name, mixed $value)
    {
        # code...
    }
}
