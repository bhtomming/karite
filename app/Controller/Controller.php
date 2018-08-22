<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\8\14 0014
 * Time: 11:52
 */

namespace app\Controller;


use app\Model\Site;
use app\Model\User;

class Controller
{
    protected $_controller;
    protected $_action;
    protected $_views;
    protected $_siteconfig;
    protected $message;
    protected $status;
    protected $user;

    public function __construct($controller,$action){
        $this->_controller = $controller;
        $this->_action = $action;

        //创建模板对象
        require WEB_ROOT . '/vendor/autoload.php';
        \Twig_Autoloader::register();
        $loader =  new \Twig_Loader_Filesystem(WEB_ROOT . '/theme');
        $this->_views = new \Twig_Environment($loader,array());
        $this->_siteconfig = new Site();
    }

    //调用模板进行渲染
    public function render($template,$var){
        $sites = $this->_siteconfig->selectAll();
        if(!empty($sites)){
            $var["site"] = $sites[0];
            $var["message"] = $this->message;
            $var["status"] = $this->status;
        }
        if(!empty($_COOKIE['karite'])){
            $ckuser = explode('#',$_COOKIE['karite']);
            $var['userid'] = $ckuser[1];
        }

        echo $this->_views->render($template, $var);
    }

}