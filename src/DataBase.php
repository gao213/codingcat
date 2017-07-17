<?php
/**
 * Created by PhpStorm.
 * User: gaoyu
 * Date: 2017/6/27
 * Time: 11:13
 */

require '../vendor/autoload.php';
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;

$database = [
    'driver'    => 'mysql',
    'host'      => '127.0.0.1',
    'database'  => 'test',
    'username'  => 'root',
    'password'  => 'qweasdzxc',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
];

$capsule = new Capsule;

// 创建链接
$capsule->addConnection($database);

// 设置全局静态可访问
$capsule->setAsGlobal();

// 启动Eloquent
$capsule->bootEloquent();

Capsule::schema()->create('users', function($table)
{
    $table->increments('id');
    $table->string('username', 40);
    $table->string('email')->unique();
    $table->timestamps();
});



