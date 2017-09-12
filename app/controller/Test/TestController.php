<?php
namespace App\Controller\Test;
use Acme\BaseController;
class TestController extends BaseController{

    public function invoke($data){
        $a = new \App\Model\Users();
//        $a->test();
        $a->get();

//        echo 111233;
//        echo 111233;
//        return $data;
        //var_dump($data);
//        echo 'is testController';
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
