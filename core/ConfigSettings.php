<?php

/**
 *
 * ConfigSettings.php
 * (c) May 26, 2013 lastprophet
 * @author Anibal Gomez (lastprophet)
 * Balero CMS Open Source
 * Proyecto %100 mexicano bajo la licencia GNU.
 * PHP P.O.O. (M.V.C.)
 * Contacto: anibalgomez@icloud.com
 *
 **/

/**
 * Obtener datos de config en XML
 */
class ConfigSettings {

    private $dbhost;
    private $dbuser;
    private $dbpass;
    private $dbname;
    private $firsttime;
    private $user;
    private $pass;
    private $email;
    private $firstname;
    private $lastname;
    private $title;
    private $description;
    private $url;
    private $keywords;
    private $newsletter;
    private $multilang;
    private $basepath;
    private $editor;

    /**
     * @return mixed
     */
    public function getDbhost()
    {
        return $this->dbhost;
    }

    /**
     * @param mixed $dbhost
     */
    public function setDbhost($dbhost)
    {
        $this->dbhost = $dbhost;
    }

    /**
     * @return mixed
     */
    public function getDbuser()
    {
        return $this->dbuser;
    }

    /**
     * @param mixed $dbuser
     */
    public function setDbuser($dbuser)
    {
        $this->dbuser = $dbuser;
    }

    /**
     * @return mixed
     */
    public function getDbpass()
    {
        return $this->dbpass;
    }

    /**
     * @param mixed $dbpass
     */
    public function setDbpass($dbpass)
    {
        $this->dbpass = $dbpass;
    }

    /**
     * @return mixed
     */
    public function getDbname()
    {
        return $this->dbname;
    }

    /**
     * @param mixed $dbname
     */
    public function setDbname($dbname)
    {
        $this->dbname = $dbname;
    }

    /**
     * @return mixed
     */
    public function getFirsttime()
    {
        return $this->firsttime;
    }

    /**
     * @param mixed $firsttime
     */
    public function setFirsttime($firsttime)
    {
        $this->firsttime = $firsttime;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param mixed $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * @return mixed
     */
    public function getNewsletter()
    {
        return $this->newsletter;
    }

    /**
     * @param mixed $newsletter
     */
    public function setNewsletter($newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * @return mixed
     */
    public function getMultilang()
    {
        return $this->multilang;
    }

    /**
     * @param mixed $multilang
     */
    public function setMultilang($multilang)
    {
        $this->multilang = $multilang;
    }

    /**
     * @return mixed
     */
    public function getBasepath()
    {
        return $this->basepath;
    }

    /**
     * @param mixed $basepath
     */
    public function setBasepath($basepath)
    {
        $this->basepath = $basepath;
    }

    /**
     * @return mixed
     */
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * @param mixed $editor
     */
    public function setEditor($editor)
    {
        $this->editor = $editor;
    }

    public function __construct() {
        $this->LoadSettings();
    }

    /**
     *
     * @function LoadSettings() Forzar la carga de variables de configuración.
     *
     */
    public function LoadSettings() {
        /**
         *
         * Leer el archivo de configuracion XML y almacenarlo en una variable.
         * <nodo>
         *    <subnodo>
         * Ejemplo: Child(""nodo,"subnodo");
         *
         */
        try {
            /**
             * Loading vars from XML
             */
            $xml = new XMLHandler(LOCAL_DIR . "/site/etc/balero.config.xml");

            $this->dbhost = $xml->Child("database", "dbhost");
            $this->dbhost = $xml->Child("database", "dbhost");
            $this->dbuser = $xml->Child("database", "dbuser");
            $this->dbpass = $xml->Child("database", "dbpass");
            $this->dbname = $xml->Child("database", "dbname");

            $this->firsttime = $xml->Child("system", "firsttime");

            $this->user = $xml->Child("admin", "username");
            $this->pass = $xml->Child("admin", "passwd");
            $this->firstname = $xml->Child("admin", "firstname");
            $this->lastname = $xml->Child("admin", "lastname");
            $this->email = $xml->Child("admin", "email");

            $this->newsletter = $xml->Child("admin", "newsletter");

            $this->title = $xml->Child("site", "title");
            $this->url = $xml->Child("site", "url");
            $this->description = $xml->Child("site", "description");
            $this->keywords = $xml->Child("site", "keywords");

            /**
             * Loading Basepath var
             */
            $this->basepath = $xml->Child("site", "basepath");

            /**
             * Multilanguage
             */
            $this->multilang = $xml->Child("site", "multilang");

            /**
             * Default editor
             */
            $this->editor = $xml->Child("site", "editor");
        } catch (Exception $e) {
            $title = "ERROR IN CLASS: " . get_class($this);
            $test = new MsgBox($title, $e->getMessage());
            $this->content .= $test->Show();
        }
    }

    /**
     * Get Full Basepath
     */
    public function FullBasepath() {
        $s = (empty($_SERVER["HTTPS"]) ? '' : (($_SERVER["HTTPS"] == "on") ? "s" : ""));
        $protocol = substr(strtolower($_SERVER["SERVER_PROTOCOL"]), 0, strpos(strtolower($_SERVER["SERVER_PROTOCOL"]), "/")) . $s;
        $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":" . $_SERVER["SERVER_PORT"]);
        $uri = $protocol . "://" . $_SERVER['SERVER_NAME'] . $port . $_SERVER['REQUEST_URI'];
        $segments = explode('?', $uri, 2);
        $url = str_replace("index.php", "", $segments[0]);

        return $url;
    }

}