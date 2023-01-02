<?php

namespace Make4U\Framework\Interfaces;

defined('MAKE4U') || die;

interface FileFactoryInterface
{
    public function create();

    public function read();

    public function update();

    public function delete();
}
