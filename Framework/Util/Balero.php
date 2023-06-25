<?php

namespace Framework\Util;

/**
 * Class Balero Framework constants class
 * @package Framework\Util
 */
class Balero
{

    /**
     * Balero App directory
     */
    const APP = "App";

    /**
     * The controllers directory
     */
    const CONTROLLERS = "Controllers";

    /**
     * Slash
     */
    const SLASH = "/";

    /**
     * Back slash
     */
    const BACK_SLASH = "\\";

    /**
     * Current folder "."
     */
    const CURRENT_FOLDER = ".";

    /**
     * Previous folder ".."
     */
    const PREVIOUS_FOLDER = "..";

    /**
     * Sets attribute "GET" default path if not set
     */
    const DEFAULT_PATH = "/";

    /**
     * Swts attribute "GET" default view if not set
     */
    const DEFAULT_VIEW = "Templates/index.html";

    /**
     * @return string App/Controllers folder root
     */
    public static function getControllersRoot(): string
    {
        return $_SERVER["DOCUMENT_ROOT"] . self::SLASH . self::APP . self::SLASH .  self::CONTROLLERS;
    }

    /**
     * @return string App\Controllers instance path
     */
    public static function getControllersInstance(): string
    {
        return self::BACK_SLASH . self::APP . self::BACK_SLASH . self::CONTROLLERS . self::BACK_SLASH;
    }

}