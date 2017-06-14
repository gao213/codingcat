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
            $string=str_replace("&amp;","&amp;amp;",$string);
            $string=str_replace("&gt;","&amp;gt;",$string);
            $string=str_replace("&lt;","&amp;lt;",$string);
            $string=str_replace(chr(32),"&amp;nbsp;",$string);
            $string=str_replace(chr(9),"&amp;nbsp;",$string);
            $string=str_replace(chr(34),"&amp;",$string);
            $string=str_replace(chr(39),"&amp;#39;",$string);
            $string=str_replace(chr(13),"&lt;br /&gt;",$string);
            $string=str_replace("'","''",$string);
            $string=str_replace("select","sel&amp;#101;ct",$string);
            $string=str_replace("join","jo&amp;#105;n",$string);
            $string=str_replace("union","un&amp;#105;on",$string);
            $string=str_replace("where","wh&amp;#101;re",$string);
            $string=str_replace("insert","ins&amp;#101;rt",$string);
            $string=str_replace("delete","del&amp;#101;te",$string);
            $string=str_replace("update","up&amp;#100;ate",$string);
            $string=str_replace("like","lik&amp;#101;",$string);
            $string=str_replace("drop","dro&amp;#112;",$string);
            $string=str_replace("create","cr&amp;#101;ate",$string);
            $string=str_replace("modify","mod&amp;#105;fy",$string);
            $string=str_replace("rename","ren&amp;#097;me",$string);
            $string=str_replace("alter","alt&amp;#101;r",$string);
            $string=str_replace("cast","ca&amp;#115;",$string);
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