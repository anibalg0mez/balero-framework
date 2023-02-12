<?php

/**
 *
 * Security.php
 * (c) Apr 5, 2013 lastprophet
 * @author Anibal Gomez (lastprophet)
 * Balero CMS Open Source
 * Proyecto %100 mexicano bajo la licencia GNU.
 * PHP P.O.O. (M.V.C.)
 * Contacto: anibalgomez@icloud.com
 *
 * 13-03-2015 Reported By Gjoko Krstic <gjoko@zeroscience.mk>
 * ------------------------------------------------
 * Multiple Authenticated Blind SQL Injections
 * Stored XSS on 'x' POST parameter
 * CSRF vulnerability is present in the entire CMS
 * XSS on the cookie 'counter'
 * ------------------------------------------------
 * 16-03-2015 Fixed by Anibal Gomez <anibalgomez@icloud.com>
 *
 *
**/

class Security {

    /**
     * @var string
     */
	private String $input;

    /**
     * Anti-XSS Method
     * @param $input Input String
     * @param int $rich Is Rich Text?
     * @return Proccesed String
     */
    public function sanitize(String $input, int $rich = 0): String {

        //$val = preg_replace("/<(.*)s(.*)c(.*)r(.*)i(.*)p(.*)t(.*)>(.*)/i", "(xss-tag-detected)", $val);
        if($rich == 0) {
            $input = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '(xss-code-detected)', $input);
        }
        $input = str_replace('\'', '\&#39;', $input);

        $search = '[a-zA-Z0-9]';
        $search .= '!@#$%^&*()';
        $search .= '~`";:?+/={}[]-\\_|\'';
        for ($i = 0; $i < strlen($search); $i++) {
            $input = preg_replace('/(&#[xX]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $input); // with a ;
            $input = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $input); // with a ;
        }
        $ra1 = array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'script', 'object', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'cript', 'scri', 'scrip', 'cript');
        $ra2 = array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
        $ra = array_merge($ra1, $ra2);

        $found = true;
        while ($found) {
            $input_before = $input;
            for ($i = 0; $i < sizeof($ra); $i++) {
                $pattern = '/';
                for ($j = 0; $j < strlen($ra[$i]); $j++) {
                    if ($j > 0) {
                        $pattern .= '(';
                        $pattern .= '(&#[xX]0{0,8}([9ab]);)';
                        $pattern .= '|';
                        $pattern .= '|(&#0{0,8}([9|10|13]);)';
                        $pattern .= ')*';
                    }
                    $pattern .= $ra[$i][$j];
                }
                $pattern .= '/i';
                $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2);
                $val = preg_replace($pattern, $replacement, $input);
                $found = false;
            }
        }
        return $input;
    }

    /**
     * Security Fix
     * @param $input
     * @return int
     */
    public function toInt($input) {
        $this->input = $input;
        $this->input = preg_replace('/[^0-9,.]+/i', '', $this->input);
        $this->input = htmlentities($this->input);
        return (int) $this->input;
    }

	public function __toString() {
		return (string)$this->input;
	}

	public function __destruct() {
		unset ($this->input);
	}

}
