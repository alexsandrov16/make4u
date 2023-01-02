<?php

namespace Make4U\Framework;

use Make4U\Framework\Interfaces\FileFactoryInterface;

defined('MAKE4U') || die;

/**
 * undocumented class
 */
class PHPFactory implements FileFactoryInterface
{
    public function __construct() {
        
    }

    public function __toString()
    {
        return 'Soy '.__CLASS__;
    }

    public function create()
    {
    }

    public function read()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}
