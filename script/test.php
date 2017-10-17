<?php
require("../vendor/autoload.php");
use Acme\DB;
$res = DB::table("users")->where('id',13)->get();
var_dump($res);


