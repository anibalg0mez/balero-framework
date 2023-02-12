<?php
/**
 *
 * Uploader.php
 * (c) Mar 25, 2015 lastprophet
 * @author Anibal Gomez (lastprophet)
 * Balero CMS Open Source
 * Proyecto %100 mexicano bajo la licencia GNU.
 * PHP P.O.O. (M.V.C.)
 * Contacto: anibalgomez@icloud.com
 *
 **/

/**
 * Upload to a bucket
 */
class Uploader {

    /**
     * Upload the image file
     * @param $file
     * @param $path
     * @return string
     * @throws Exception
     */
    public function image($file, $path) {
        if (!$file['error']) {
            $name = md5(rand(100, 200));
            $ext = explode('.', $file['name']);
            if(!$this->isImage($ext)) {
                throw new UploaderException("Looks like this is not a image file!!");
            }
            $filename = $name . '.' . $ext[1];
            if (!is_writable($path . "/public/images/")) {
                throw new UploaderException("Directory " . $path . "/public/images is not writable.
                    Set chmod permissions to 777.");
            }
            $destination = $path . "/public/images/" . $filename; //change this directory
            $location = $file["tmp_name"];
            move_uploaded_file($location, $destination);
        } else {
            throw new UploaderException("Ooops!  Your upload triggered
                the following error:  " . $file['error']);
        }
        return $this->getBasepath($path) . "/public/images/" . $filename;
    }

    public function isImage($ext) {
        if(in_array($ext , array("gif" , "jpeg" , "png", "bpm")))  {
            return true;
        }
        return false;
    }

    public function getBasepath($path) {
        $config = simplexml_load_file($path . "/site/etc/balero.config.xml");
        return $config->site[0]->basepath;
    }

}