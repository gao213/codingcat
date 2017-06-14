<?php
/**
 * Created by PhpStorm.
 * User: gaoyu
 * Date: 2017/6/14
 * Time: 12:29
 */
namespace Acme;
class Xml{

    public static function toXml($data, $eIsArray=FALSE, $root = false, $encode = "") {
        $xml = new XmlWriter();
        $f_root = (!$root) ? 'REQUEST' : $root;
        if(!$eIsArray) {
            $xml->openMemory();
            $xml->startDocument('1.0', empty($encode) ? 'GBK' : $encode);
            $xml->startElement($f_root);
        }
        foreach($data as $key => $value){
            $items = array('item0','item1','item2','item3');
            if(is_array($value)){
                $tmp = $key;
                if(in_array($tmp,$items)){
                    $tmp ='item';
                }
                $xml->startElement($tmp);
                self::toXml($value, TRUE, $f_root);
                $xml->endElement();
                continue;
            }
            $xml->writeElement($key, $value);
        }
        if(!$eIsArray) {
            $xml->endElement();
            return $xml->outputMemory(true);
        }
    }

    public static function toArray($data){
        $xml = simplexml_load_string($data);
        return json_decode(json_encode($xml),TRUE);
    }
}