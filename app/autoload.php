<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

function _l($txt, $array=array())
{
    $file = "/var/www/journalist/app/logs/log.txt";
    
    if (! empty($array)) {
        $txt .= print_r($array,true);
    }

    if (is_array($txt) || is_object($txt)) {
        $txt = print_r($txt, true);
    }

    $date = date("Y-m-d H:i:s");
    $f = fopen($file, 'a');
    fwrite($f, $date . " -- " . $txt . "\n");
    fclose($f);
}


/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
