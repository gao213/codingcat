<?php
namespace App\Action;

class TestAction extends BaseAction{

    public function Index(){
        echo "is index action=========>";
    }

    public function Test(){
        return array('a'=>'aaaa','b'=>'bbbbb');
    }
}
