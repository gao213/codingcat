<?php
/**
 * Created by PhpStorm.
 * User: gaoyu
 * Date: 2017/6/14
 * Time: 10:34
 */
namespace Acme;
class Params{

    public static function getParams(){
        return Security::htmlencode(array_merge($_GET, $_POST, $_COOKIE));
    }

    public static function getJson(){
        return Security::htmlencode(json_decode(file_get_contents("php://input"),true));
    }

    public static function getXml(){
        $xml_parser = xml_parser_create();
        if(xml_parse($xml_parser,file_get_contents("php://input"),true)) {
            return Security::htmlencode(Xml::toArray(file_get_contents("php://input"), true));
        }else{
            return false;
        }
    }

    public static function getData(){
        return file_get_contents("php://input");
    }

}