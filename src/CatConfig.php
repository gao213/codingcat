<?php
/**
 * Created by PhpStorm.
 * User: gaoyu
 * Date: 2017/6/14
 * Time: 17:02
 */
namespace Acme;
class CatConfig{
    public static function getConfig($name, $type = false){
        if(empty($name)){ return false; }
        $res =  require(__DIR__."/../config/".$name.".php");
        return $type ?  $res[$type]: $res;
    }
}



