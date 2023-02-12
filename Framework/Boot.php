<?php

/**
 *
 * autoloader.php
 * (c) May 11, 2013 lastprophet 
 * @author Anibal Gomez (lastprophet)
 * Balero CMS Open Source
 * Proyecto %100 mexicano bajo la licencia GNU.
 * PHP P.O.O. (M.V.C.)
 * Contacto: anibalgomez@icloud.com
 *
**/

/**
 * 
 * Cargar funcionalidad del núcleo
 *
 */

class Boot {
	
	protected $class;

    const CORE_DIRECTORY = "Framework";
	
	public function __construct() {
		spl_autoload_register(array($this, Boot::CORE_DIRECTORY));
	}

	public function init($class) {
		$this->class = $class;
		if(file_exists(LOCAL_DIR . "/" . Boot::CORE_DIRECTORY . "/" . $this->class . ".php")) {
			require_once(LOCAL_DIR . "/" . Boot::CORE_DIRECTORY . "/" . $this->class . ".php");
		}
	}
	
	    
}