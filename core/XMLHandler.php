<?php

/**
 *
 * XMLHandler.php
 * (c) Apr 17, 2023 lastprophet
 * @author Anibal Gomez (lastprophet)
 * Balero Framework Open Source
 * Proyecto %100 mexicano bajo la licencia GNU.
 * PHP P.O.O. (M.V.C.)
 *
 **/

/**
 *
 * Manejador de archivos XML
 * @author lastprophet
 *
 */
class XMLHandler {

    private $file;
    private $obj;
    private $node;

    /**
     * @return mixed|string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed|string $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getObj()
    {
        return $this->obj;
    }

    /**
     * @param mixed $obj
     */
    public function setObj($obj)
    {
        $this->obj = $obj;
    }

    /**
     * @return mixed
     */
    public function getNode()
    {
        return $this->node;
    }

    /**
     * @param mixed $node
     */
    public function setNode($node)
    {
        $this->node = $node;
    }

    public function __construct($file = "") {
        $this->file = $file;
        if (!file_exists($file)) {
            throw new Exception(get_class($this) . ": No existe el archivo: " . $file);
        } else {
            $this->readXML($file);
        }
    }

    public function readXML($file = "") {
        $this->node = array();
        if (file_exists($file)) {
            $this->obj = simplexml_load_file($file);
        } else {
            throw new Exception(_FILE_DONT_EXIST . " " . $file);
        }
        if (!$this->obj) {
            throw new Exception(_WARNING_LOADING_FILE . " " . "<b>" . $file . "</b>");
        }
    }

    public function Child($child, $subchild) {
        if ($this->obj) {
            $_value = 0;
            foreach ($this->obj->$child as $key => $value) {
                //echo "<br>array->key: " . $key . " valor: " . $value->$subchild . "<br>";
                $_value = $value->$subchild;
                if ($_value == "_blank") {
                    $_value = "";
                }
            }
        } else {
            throw new Exception(_XML_ERROR_CHILD);
        }
        return $_value;
    }

    /**
     * Como usar:
     * editChild($PATH)
     * Eje: <config>
     *            <database>
     *                <dbuser>root</dbuser>
     *            </database>
     *        </config>
     *    $PATH = "/config/database/dbuser"
     */
    public function editChild($path, $value) {
        try {
            $this->node = $this->obj->xpath($path);
            if (empty($value)) {
                $this->node[0][0] = "_blank";
            } else {
                $this->node[0][0] = htmlspecialchars($value);
            }
            $this->obj->asXML($this->file);
        } catch (Exception $e) {

        }
    }

    public function __destruct() {
    }

}
