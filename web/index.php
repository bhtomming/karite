<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\8\13 0013
 * Time: 11:47
 */
use core\DrupaiFWK;
define('WEB_PUBLIC',__DIR__.'/');
define('WEB_ROOT',dirname(WEB_PUBLIC));
define('APP_HOME',WEB_ROOT.'/app');
define('DEBUG',true);

require(WEB_ROOT.'/core/DrupaiFWK.php');

$config = require(APP_HOME.'/config/config.php');
(new DrupaiFWK($config))->run();