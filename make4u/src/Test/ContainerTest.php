<?php

namespace Make4U\Test;

/**
 * undocumented class
 */
class ContainerTest
{
    public function __construct() {
        $this->name= __CLASS__;
    }

    public function render()
    {
        echo $this->name;
    }
}
