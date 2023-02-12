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
 * Cargar clases de nuestra 'modules'
 *
 */

class AutoLoader {
	
	protected $class;

    /**
     * @module the module folder to load
     */
	private $module;

    const MODULE_DIRECTORY = "module";
	
	public function __construct($module = "") {
		$this->module = $module;
		spl_autoload_register(array($this, AutoLoader::MODULE_DIRECTORY));
	}

	/**
	 * 
	 * Buscar clases dentro de el modulo
     * Example of functionality: index.php?module=$class
	 */
	public function init($class) {
		$this->class = $class;
		if(file_exists(APPS_DIR . $this->module . "/" . $this->class . ".php")) {
			require_once(APPS_DIR . $this->module ."/" . $this->class . ".php");
		}
	}

	    
}
