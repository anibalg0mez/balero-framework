<?php

/**
 *
 * Class for autoloading with namespaces
 * (c) May 11, 2023 lastprophet 
 * @author Anibal Gomez (lastprophet)
 * Balero CMS Open Source
 * Proyecto %100 mexicano bajo la licencia GNU.
 * PHP P.O.O. (M.V.C.)
 *
**/

spl_autoload_register('AutoLoader');

function AutoLoader($className) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    require_once $file . '.php'; 
}
