<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\8\5 0005
 * Time: 14:44
 */
include_once('sqlconfig.php');

if(version_compare(PHP_VERSION,'5.0.0','>')){
    $mysqli = new mysqli($host,$user,$passWord,$dbname,$port);
    $mysqli ->query('set names utf8');
    echo '目前的环境适合搭建';
}else{
    echo '你的php版本号太低，请升级到5.0以上,你目前的PHP版本号是:'.PHP_VERSION;
}
