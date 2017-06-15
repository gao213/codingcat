<?php
/**
 * Created by PhpStorm.
 * User: gaoyu
 * Date: 2017/6/14
 * Time: 12:05
 */
namespace Acme;
class Security{

    public static function htmlencode($string) {
        if (is_array($string)) {
            foreach ($string as $key => $value) {
                $string[$key] = self::htmlencode($value);
            }
        } else {
            if(empty($string)) return;
            if($string=="") return $string;
            $string=trim($string);
            $string=htmlspecialchars($string, ENT_QUOTES);
            $string=str_replace('\u003c',"&lt;",$string);
            $string=str_replace('\u003e',"&gt;",$string);
        }
        return $string;
    }

    public static function add_slashes($stringing) {
        if (is_array($stringing)) {
            foreach ($stringing as $key => $value) {
                $stringing[$key] = self::add_slashes($value);
            }
        } else {
            $stringing = addslashes($stringing);
        }
        return $stringing;
    }
}