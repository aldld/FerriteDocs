<?php
/*
 * Copyright (c) 2010 Eric Bannatyne
 */

namespace ferrite;

function autoload($className) {
    $pathArray = explode('\\', $className);
    $path = '';
    $class = '';
    $firstWord = true;
    
    for ($i = 0; $i < count($pathArray); $i++) {
        if ($pathArray[$i] && !$firstWord) {
            if ($i == count($pathArray) - 1)
                $class = $pathArray[$i];
            else
                $path .= DIRECTORY_SEPARATOR . $pathArray[$i];
        }
        
        if ($pathArray[$i] && $firstWord) {
            if ($pathArray[$i] != __NAMESPACE__)
                break;
            $firstWord = false;
        }
    }
    
    if (!$firstWord) {
        $fullPath = __DIR__ . '/lib' . $path . DIRECTORY_SEPARATOR . $class . '.php';
        require_once $fullPath;
    }
    return false;
}

spl_autoload_register(__NAMESPACE__ . '\autoload');

require_once __DIR__ . '/loader.php';
