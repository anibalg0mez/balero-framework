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

// DO NOT EDIT
// ----------------------------

define("_CORE_VERSION", "1.0");

require_once("./Framework/Router.php");
$objRouter = new Router();
