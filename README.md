# codingcat
#v1.1

重构路由，增加控制器，封装数据源，增加安全模块跟xml解析模块 修改命名规则


#Acme

Acme 空间为框架的核心空间 所有的内建函数与第三方包都在这里进行二次封装

理论上不允许直接调用composer的第三发包 要通过Acme封装 再进行使用

Acme对应目录为 /src


#路由

/App/Test/Index 路由规则为 ／项目／action文件／action对应的方法


#数据层（Action）


Action层只接收并强制转换数据类型，简历前端数据于后端框架的映射关系，不做其余操作

所有的get，post，cookie数据封装在 $this->params 中（已经进行html转译 防止xss注入）

如果要获取jsom／xml数据可以调用 \Acme\Params 模块中的方法 提供了 json， xml，和原生数据的获取方式


\Acme\Params::getJson()

\Acme\Params::getXml()

\Acme\Params::getParams()

\Acme\Params::getData()


理论上不允许action以为的地方调用\Acme\Params 模块 所有的外部数据 均在action中过滤处理才可以到控制器


Action对应目录为 /项目/action

需要继承 BaseAction 父类;


#控制器（Controller）


Controller采用自动渲染的方式当你新建了Action层的时候 框架会自动加载相对应的Controller


/App/Test/Index Action为例 会自动加载 /app/controller/Test/IndexController.php 并执行invoke($data)方法


$data的数据来源与Action return的数据


控制器缺省的状态下会直接输出Action return的数据


需要继承 BaseController 父类;



=================================================


app/action/TestAction.php


<?php

class TestAction extends BaseAction{


    public function Test(){
    
        return array('a'=>'aaaa','b'=>'bbbbb');
        
    }
    
}



app/controller/Test/TestController.php


<?php

namespace App\Controller\Test;

use App\Controller\BaseController;


class TestController extends BaseController{

    public function invoke($data){
    
        var_dump($data);// 结果为 array('a'=>'aaaa','b'=>'bbbbb')
        
}



===================================================
#数据输出
框架将直接输出Controller中return的数据
在BaseAction 中定义了一个 __display()方法
可以自定义相应的数据输出标准 默认定义了 json／xml
通过 $returnType 可以控制返回的数据结构与类型

====================================================
switch($this->returnType){
    case 'JSON':
        echo json_encode(array('errNo'=>'1','errMsg'=>'','data'=>$this->_res));break;
        
    case 'XML' :
        if(empty($this->_res)){ die('xml err');}
        
        $xml = new \Acme\Xml();
        
        echo $xml->toXml($this->_res,false,$this->xmlRoot,$this->xmlEncode);break;
        
}





=====================================================



