<?php

namespace Framework\Route;

/**
 *
 * @author Anibal Gomez (lastprophet)
 * Balero Framework Open Source
 * Proyecto %100 mexicano bajo la licencia GNU.
 *
 **/

use Framework\Http\Request;
use Framework\Http\Response;
use Framework\Reader\DirectoryReader;
use Framework\Util\Balero;

class Router extends RouterRegister
{
    /**
     * Reads controllers folder and instance it each one
     * ex: $controller = new App\Controllers\$Controller
     */
    public function __construct()
    {
        $dr = new DirectoryReader();
        $controllers = $dr->listAllFiles();
        foreach ($controllers as $c) {
            $controller = Balero::getControllersInstance() . $c;
            $this->deployMethods(new $controller); // TODO: Test with multiple controllers
        }
    }

    /**
     * @param $app_route string Path. Ex: /post/
     * @param $httpMethod Request HTTP Method. Ex: GET, POST, ...
     * @param $app_callback callback
     */
    public static function request($app_route, $httpMethod, $app_callback)
    {
        if (strcasecmp($_SERVER["REQUEST_METHOD"], $httpMethod) !== 0) {
            return;
        }
        self::on($app_route, $app_callback);
    }

    /**
     * @deprecated only as reference, delete it
     */
    public static function get($app_route, $app_callback)
    {
        if (strcasecmp($_SERVER["REQUEST_METHOD"], "GET") !== 0) {
            return;
        }

        self::on($app_route, $app_callback);
    }

    /**
     * @deprecated only as reference, delete it
     */
    public static function post($app_route, $app_callback)
    {
        if (strcasecmp($_SERVER["REQUEST_METHOD"], "POST") !== 0) {
            return;
        }

        self::on($app_route, $app_callback);
    }

    /**
     * Http Request Logic
     * @param $exprr
     * @param $call_back
     */
    public static function on($exprr, $call_back)
    {
        $paramtrs = $_SERVER["REQUEST_URI"];
        $paramtrs = stripos($paramtrs, "/") !== 0 ? "/" . $paramtrs : $paramtrs;
        $exprr = str_replace("/", "\/", $exprr);
        $matched = preg_match(
            "/^" . $exprr . '$/',
            $paramtrs,
            $is_matched,
            PREG_OFFSET_CAPTURE
        );

        if ($matched) {
            // first value is normally the route, lets remove it
            array_shift($is_matched);
            // Get the matches as parameters
            $paramtrs = array_map(function ($paramtr) {
                return $paramtr[0];
            }, $is_matched);
            $call_back(new Request($paramtrs), new Response());
        }
    }
}
