<?php
/**
 * Created by PhpStorm.
 * User: gaoyu
 * Date: 2017/6/14
 * Time: 17:02
 */
namespace App\Model;
use \Acme\DataBase;
class  Users extends DataBase{
    protected $table = 'aaaa';
    function test(){
        $user = new Users;
        $user->username = 'someone';
        $user->email = 'some@overtrue.me';
        $user->save();
    }

    function get(){
        $users = Users::all();
        echo json_encode($users);die;
    }
}
