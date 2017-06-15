<?php
/**
 * Created by PhpStorm.
 * User: gaoyu
 * Date: 2017/6/14
 * Time: 12:29
 */
namespace Acme;
class Xml{

    private $xml;

    public function __construct(){
        $this->xml = new \XmlWriter();
    }

    public function toXml($data, $eIsArray=FALSE, $root = false, $encode = "") {
        $f_root = (!$root) ? 'REQUEST' : $root;
        $encode = empty($encode) ? 'GBK' : $encode;
        if(!$eIsArray) {
            $this->xml->openMemory();
            $this->xml->startDocument('1.0', $encode);
            $this->xml->startElement($f_root);
        }
        foreach($data as $key => $value){
            if(is_array($value)){
                $tmp = $key;
                $this->xml->startElement($tmp);
                $this->toXml($value, TRUE, $f_root, $encode);
                $this->xml->endElement();
                continue;
            }
            $this->xml->writeElement($key, $value);
        }
        if(!$eIsArray) {
            $this->xml->endElement();
            return $this->xml->outputMemory(true);
        }
    }

    public static function toArray($data){
        $xml = simplexml_load_string($data);
        return json_decode(json_encode($xml),TRUE);
    }
}