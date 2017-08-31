<?php
/**
 * Created by PhpStorm.
 * User: gaoyu
 * Date: 2017/6/14
 * Time: 17:02
 */
namespace App\Action;
use \Acme\CatExceptionCodes;
use \Acme\CatException;
use \Acme\Params;
class  BaseAction{

    public $returnType = 'JSON';
    public $_res = array();
    public $_obj;
    public $_error;
    public $params;
    public $xmlRoot = 'REQUEST';
    public $xmlEncode = 'GBK';
    public function __init($home, $acion, $fun){
        $this->params = Params::getParams();
        try{
            $this->_error['errNo']   = CatExceptionCodes::PARAM_OK;
            $this->_error['errStr']  = '';
            if (!method_exists($this, $fun)) {
                throw new CatException(CatExceptionCodes::SYS_ERR);
            }
            $this->_res = $this->$fun();
            $class = '\\'.$home.'\\Controller\\'.$acion.'\\'.$fun."Controller";
            if(class_exists($class)){
                    $this->_obj = new $class;
                    $this->_res = $this->_obj->invoke($this->_res);
            }
        }catch (CatException $e){
                $this->_error['errNo']   = $e->getErrNo();
                $this->_error['errStr']  = $e->getErrStr();
                $this->_error['errFile'] = $e->getFile();
                $this->_error['errLine'] = $e->getLine();
                //写日志
        }
        $this->__display();
    }

    public function __display(){
        switch($this->returnType){
            case 'JSON':
                echo json_encode(array('errNo'=>$this->_error['errNo'], 'errMsg'=>$this->_error['errStr'],'data'=>$this->_res));break;
            case 'XML' :
                if(empty($this->_res)){ die('xml err');}
                $xml = new \Acme\Xml();
                echo $xml->toXml($this->_res,false,$this->xmlRoot,$this->xmlEncode);break;
        }
    }
}