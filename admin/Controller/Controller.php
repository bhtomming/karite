<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\8\10 0010
 * Time: 17:08
 */
namespace admin\Controller;
class Controller
{
    public function render($template,Array $var)
    {
        require DPCMS_CORE . '/vendor/autoload.php';
        \Twig_Autoloader::register();
        $loader =  new \Twig_Loader_Filesystem(DPCMS_CORE . '/theme');
        $twig = new \Twig_Environment($loader, array());
        echo $twig->render($template,$var);
    }
}