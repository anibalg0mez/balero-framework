<?php

namespace Framework\Http;

/**
 *
 * @author Anibal Gomez (lastprophet)
 * Balero Framework Open Source
 * Proyecto %100 mexicano bajo la licencia GNU.
 *
 **/

class Response
{
    private $p_status = 200;

    public function p_status(int $p_code)
    {
        $this->p_status = $p_code;
        return $this;
    }

    public function toView($data)
    {
        http_response_code($this->p_status);
        header("Content-Type: text/html");
        echo $data;
    }

    public function toJSON($data = [])
    {
        http_response_code($this->p_status);
        header("Content-Type: application/json");
        echo json_encode($data);
    }
}
