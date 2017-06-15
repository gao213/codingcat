<?php
namespace App\Action;

class TestAction extends BaseAction{

    public function Index(){
        echo "is index action=========>";
    }

    public function Test(){
        $this->returnType = "XML";
        return array('a'=>'aaaa','b'=>'bbbbb');
    }
}
