<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\8\7 0007
 * Time: 17:33
 */

use admin\Controller\Controller;
define('DPCMS_ADMIN', dirname(__FILE__));
define('DPCMS_CORE', dirname(DPCMS_ADMIN));
define('WEB_ROOT', dirname(DPCMS_CORE));
define('APP_NAME', basename(DPCMS_CORE));
//require_once DPCMS_CORE . '/admin/Controller/Controller';
function  __autoload ( $class_name ) {
    $filePath = DPCMS_CORE."\\".$class_name.".php";
    if (is_readable($filePath)) {
        require($filePath);
    }
}
$contr = new Controller();
$contr->render('admin/imgset.twig', array('name' => 'Fabien'));

