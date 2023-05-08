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

spl_autoload_register('autoloadFolders');

/**
 * namespaces
 */
function autoloadNamespaces($className) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    require_once $file . '.php'; 
}

/**
 * namespaces
 */
function autoloadFolders($className) {
    if(file_exists("./Framework/" . $className . ".php")) {
        require_once "./Framework/" . $className . ".php"; 
    }
    if(file_exists("./Framework/" . $className . ".php")) {
        require_once "./Framework/" . $className . ".php"; 
    }
}