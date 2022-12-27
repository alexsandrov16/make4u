<?php
defined('MAKE4U') || die;

/**
 * Autoload PSR4
 */

$namespace = [
    'Make4U'       => 'make4u/src',
    'Plugins'      => 'content/plugins'
];

spl_autoload_register(function ($class) use ($namespace) {
    foreach ($namespace as $key => $value) {
        $len = strlen($key);
        $file = str_replace(['\\', '/'], DS, ABS_PATH . $value . substr($class, $len) . '.php');

        if (is_readable($file)) return require_once $file;
    }
    throw new Exception("Class $class not found");
    
    /*die(<<<HTML
    <pre>Class <b>"$class"</b> not found. Not found file <u>{$file}</pre>
    HTML);*/
});