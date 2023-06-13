<?php

namespace Framework\Reader;

use Framework\Util\Balero;

/**
 * Generic class to read files from directory
 * @package Framework\Reader
 */
class DirectoryReader
{

    /**
     * It ignores "." and ".." register
     * @return array of directories
     */
    public function listAllFiles(): array
    {
        $dir = Balero::getControllersRoot();
        $items = array();
        foreach (scandir($dir) as $item) {
            if (!($item == Balero::CURRENT_FOLDER)) {
                if (!($item == Balero::PREVIOUS_FOLDER)) {
                    array_push($items, $this->removeExt($item));
                }
            }
        }
        return $items;
    }

    /**
     * Remopve extensions
     * @param $path
     * @return mixed|string
     */
    function removeExt($path): mixed
    {
        $basename = basename($path);
        return !str_contains($basename, '.') ? $path : substr($path, 0, - strlen($basename) + strlen(explode('.', $basename)[0]));
    }

}