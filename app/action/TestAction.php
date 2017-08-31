<?php
namespace App\Action;

use Acme\CatException;

class TestAction extends BaseAction{

    public function Index(){
        echo "is index action=========>";
    }

    public function Test(){

//        return array('a'=>'aaaa','b'=>'bbbbb');
    }

    public function TestException(){
        throw new CatException('3','1');
        return array('a'=>'aaaa','b'=>'bbbbb');
    }
}
