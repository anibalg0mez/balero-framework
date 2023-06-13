<?php

namespace Framework\Reader;

/**
 * Generic class to read files from directory
 * @package Framework\Reader
 */
class DirectoryReader
{

    /**
     * @return array of directories
     */
    public function listAllFiles(): array
    {
        $dir = $_SERVER["DOCUMENT_ROOT"] . "/App/Test"; // TODO: Add to constants file
        $items = array();
        foreach (scandir($dir) as $item) {
            if (!($item == '.')) {
                if (!($item == '..')) {
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