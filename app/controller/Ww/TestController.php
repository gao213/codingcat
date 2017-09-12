<?php
namespace App\Controller\Test;
use Acme\BaseController;
class TestController extends BaseController{

    public function invoke($data){
        var_dump($data);
    }
}
