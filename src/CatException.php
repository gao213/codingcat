<?php
/**
 * Created by PhpStorm.
 * User: gaoyu
 * Date: 2017/6/14
 * Time: 18:11
 */
namespace Acme;
class CatException extends \Exception{
    private $errno;
    private $errstr;

    public function __construct($errno, $appendStr = null)
    {
        $this->errno = $errno;
        $errstr =  @CatExceptionCodes::$errMsg[$errno];

        if($errstr == null)
        {
            $errstr = '---Errno msg not found . no:' . $errno;
        }

        $this->errstr = $errstr;

        if(!empty($appendStr)) {
            //$this->errstr .= "[".$appendStr. "]";
            $this->errstr = $appendStr;
        }
        parent::__construct($errstr, $errno);
    }

    public function getErrNo()
    {
        return $this->errno;
    }

    public function getErrStr()
    {
        return $this->errstr;
    }
}