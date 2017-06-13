<?php
/**
 * Created by PhpStorm.
 * User: gaoyu
 * Date: 2017/6/13
 * Time: 16:24
 */
namespace Acme;
class Router{
    private $home;
    private $action;
    private $implement;
    private $uri;

    public function run($path = "/App/Index/index"){
        return $this->dispatch($path);
    }

    public function dispatch($path){

        if($_SERVER['REQUEST_URI'] == DIRECTORY_SEPARATOR){
            $this->uri = $path;
        }else{
            $this->uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        }

//        $this->uri = "Acme/Router/addorder";
        $this->_setPatch();
        $obj = $this->_getObj();
        if(false !== $obj){
            $fun = $this->implement;
            $obj->$fun();
        }else{
	    die('no action');
	}
    }

    private function _setPatch(){
        if(empty($this->uri)){
            return false;
        }
        $path = explode(DIRECTORY_SEPARATOR,$this->uri);
        $this->_setHome($path[1]);
        $this->_setAction($path[2]);
        $this->_setImplement(@$path[3]);
    }

    private function _getObj(){
	$class = $this->home.'\\'.$this->action;
        if(class_exists($class)){
            return new $class;
        }else{
            return false;
        }
    }

    private function _setHome($home){
        $this->home = empty($home) ? 'App' : $home;
    }

    private function _setAction($action){
        $this->action = empty($action) ? 'Index' : $action;
    }

    private function _setImplement($implement){
        $this->implement = empty($implement) ? 'index' : $implement;
    }
}
