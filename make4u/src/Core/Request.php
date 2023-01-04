<?php

namespace Make4U\Core;

use Make4U\Core\Traits\Http;

defined('MAKE4U') || die;

/**
 * undocumented class
 */
class Request
{
    use Http;

    public function __construct(private array $server = [])
    {
        $this->server = $_SERVER;
        
        foreach ($this->server as $name => $value) {
            if (preg_match('/^HTTP_/', $name)) {
                $this->addHeader($name,$value);
            }
        }
    }

    public function method(): string
    {
        return $this->server['REQUEST_METHOD'];
    }

    public function target(): string
    {
        return $this->server['REQUEST_URI'];
    }

    public function url() //: Uri
    {
        # code...
    }
}
