<?php

namespace Make4U;

use Make4U\Core\Console;
use Make4U\Core\Request;
use Make4U\Core\Traits\Singleton;

defined('MAKE4U') || die;

/**
 * Crontolador Frontal
 */
class Make4U
{
    const version =  '0.2-alpha1';

    use Singleton;

    protected function __construct()
    {
        #echo self::version;
    }

    public function run()
    {
        if (PHP_SAPI === 'cli') {
            return new Console;
        }

        echo <<<END
<!DOCTYPE html>
<meta charset="UTF-8" />
<title>\$_SERVER</title>
<style>
    table {
        border-collapse: collapse;
    }
    td {
        border: 1px solid #999;
        padding: 3px;
    }
</style>
<table>
END;
        foreach ($_SERVER as $k => $v) {
            $key = htmlentities($k);
            $value = htmlentities($v);
            echo "\n\t<tr>\n\t\t<td>$key\n\t\t<td>$value\n";
        }
        echo "</table>";



        $request = new Request;

        var_dump($request->getHeaders());
    }
}
