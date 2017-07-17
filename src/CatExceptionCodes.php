<?php
/**
 * Created by PhpStorm.
 * User: gaoyu
 * Date: 2017/6/14
 * Time: 18:14
 */
namespace Acme;
class CatExceptionCodes{
    const PARAM_OK = 0;
    const PARAM_ERROR = 1;

    public static $errMsg = array(
            self::PARAM_ERROR                 => '参数错误',
        );
}


