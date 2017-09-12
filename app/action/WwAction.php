<?php

namespace App\Action;
use Acme\BaseAction;
//use Acme\CatException;

class WwAction extends BaseAction{

    public function Index(){
        echo "is index action=========>";
    }

    public function Test(){

        return array('a'=>'123123','b'=>'123123');
    }

    public function TestException(){
//        throw new CatException('3','1asdfasf');
        return array('a'=>'aaaa','b'=>'bbbbb');
    }
}
