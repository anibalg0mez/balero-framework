<?php

namespace Framework\Route;

/**
 *
 * @author Anibal Gomez (lastprophet)
 * Balero Framework Open Source
 * Proyecto %100 mexicano bajo la licencia GNU.
 *
 **/

use App\Test\TestController;
use Framework\Http\Request;
use Framework\Http\Response;

class Router extends RouterRegister
{
    /**
     * Deploy all HTTP Request Methods
     */
    public function __construct()
    {
        $this->deployMethods(TestController::class);
    }

    public static function get($app_route, $app_callback)
    {
        if (strcasecmp($_SERVER["REQUEST_METHOD"], "GET") !== 0) {
            return;
        }

        self::on($app_route, $app_callback);
    }

    public static function post($app_route, $app_callback)
    {
        if (strcasecmp($_SERVER["REQUEST_METHOD"], "POST") !== 0) {
            return;
        }

        self::on($app_route, $app_callback);
    }

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
