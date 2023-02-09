<?php

/**
 *
 * index.php
 * (c) Feb 08, 2023 lastprophet 
 * @author Anibal Gomez (lastprophet)
 * Balero Framework Open Source
 * Proyecto %100 mexicano bajo la licencia GNU.
 * PHP P.O.O. (M.V.C.)
 *
**/

error_reporting(-1); // Debug: Developer (-1) / User (0)
define("_CORE_VERSION", "0.9"); // Version

// DO NOT EDIT
// -----------
$dir = dirname(__FILE__); // Windows Servers
$dir = str_replace("\\", "/", $dir);

define("LOCAL_DIR", $dir); // Current dir
define("APPS_DIR", LOCAL_DIR . "/site/apps/"); // App dir
define("MODS_DIR", LOCAL_DIR . "/site/apps/admin/mods/"); // Mods dir

require_once(LOCAL_DIR . "/core/Router.php"); // Load

$objRouter = new Router();
$objRouter->init(); // Do magic
// -----------
