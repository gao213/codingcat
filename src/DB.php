<?php
/**
 * Created by PhpStorm.
 * User: gaoyu
 * Date: 2017/6/27
 * Time: 11:13
 */
namespace Acme;
require_once("../vendor/autoload.php");
use Illuminate\Database\Capsule\Manager as Capsule;

$database = CatConfig::getConfig('DB');
$capsule = new Capsule;

// 创建链接
$capsule->addConnection($database);

// 设置全局静态可访问
$capsule->setAsGlobal();

// 启动Eloquent
$capsule->bootEloquent();


class DB extends Capsule{

}







