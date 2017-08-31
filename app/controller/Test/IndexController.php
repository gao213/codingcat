<?php
namespace App\Controller\Test;
use App\Controller\BaseController;

class IndexController extends BaseController{
    function invoke($data){
        echo "is IndexController";
        throw new \Acme\CatException('3','1');
        echo 111;
//        throw new \Exception();
//        echo 'err';
//        echo 'is indexController';die;
//    echo $data['aa'];
//    var_dump(\Acme\Params::getXml());die;
//    var_dump($data);die;
//    $a['a'] = '123';
//    $a['b'] = '222';
//    $a['c']['d'] = '333';
//    $xml = new \Acme\Xml();
//    $xml = $xml->toXml($a);
//    var_dump($xml);
    }
}
