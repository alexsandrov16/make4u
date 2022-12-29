<?php

namespace Make4U\Framework;

use Make4U\Framework\Traits\Singleton;

defined('MAKE4U') || die;

/**
 * undocumented class
 */
class Config
{
    use Singleton;

    protected function __construct() {
        $this->load('');
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
