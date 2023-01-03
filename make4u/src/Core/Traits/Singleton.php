<?php

namespace Make4U\Core\Traits;

defined('MAKE4U') || die;

/**
 * Singleton Patterns
 */
trait Singleton
{
    static protected ?object $instance = null;

    static function init(mixed ...$params):object
    {
        self::$instance = (self::$instance instanceof self) ? self::$instance : new self(...$params) ;

        return self::$instance;
    }
}
