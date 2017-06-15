<?php
/**
 * Created by PhpStorm.
 * User: gaoyu
 * Date: 2017/6/14
 * Time: 17:02
 */
namespace App\Action;

class  BaseAction{

    public $returnType = 'JSON';
    public $_res = array();
    public $_obj;
    public $params;
    public $xmlRoot = 'REQUEST';
    public $xmlEncode = 'GBK';
    public function __init($home, $acion, $fun){
        $this->params = \Acme\Params::getParams();
        $this->_res = $this->$fun();
        $class = '\\'.$home.'\\Controller\\'.$acion.'\\'.$fun."Controller";
        if(class_exists($class)){
            $this->_obj = new $class;
            $this->_res = $this->_obj->invoke($this->_res);
        }else{
            echo 'meiyou kongzhiqi';
        }
        $this->__display();
    }

    public function __display(){
        switch($this->returnType){
            case 'JSON':
                echo json_encode(array('errNo'=>'1','errMsg'=>'','data'=>$this->_res));break;
            case 'XML' :
                if(empty($this->_res)){ die('xml err');}
                $xml = new \Acme\Xml();
                echo $xml->toXml($this->_res,false,$this->xmlRoot,$this->xmlEncode);break;
        }
    }

}