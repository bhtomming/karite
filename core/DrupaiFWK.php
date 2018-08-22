<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\8\13 0013
 * Time: 12:00
 */

namespace core;


//use app\Controller\Controller;
//use app\Controller\BaseController;

use app\Server\LoginServer;

class DrupaiFWK
{
    protected $_config = [];

    protected $access='';
    protected $controller;

    public function __construct($config){
        $this->_config = $config;
    }

    public function run(){
        //自动加载类
        spl_autoload_register(array($this,'loadClass'));
        //检测调试模式
        $this->valiDebug();
        //清除敏感字符
        $this->removeMagicQuotes();
        //清除自定义全局变量
        $this->unregisterGlobals();
        //配置路由器
        $this->setDBconfig();
        //进行路由分析
        $this->route();
    }

    //路由分析
    public function route(){
        $controllerName = $this->_config['defaultController'];
        $actionName = $this->_config['defaultAction'];

        $params =[];
        $backend = $this->_config['backend'];

        $url = $_SERVER['REQUEST_URI'];
        $url = trim($url,'/');

        $urlArray = explode('/',$url);
        $islogin = LoginServer::isLogin(); //判断是否已经登录
            if(!empty($urlArray)){
                array_filter($urlArray);//删除空数组

                if($islogin && strtolower($urlArray[0])==strtolower($backend)){
                    array_shift($urlArray);
                    $controllerName = ucfirst( empty($urlArray[0])? 'default':$urlArray[0]);
                    $this->controller = '\\app\\Controller\\'.$backend.'\\'.$controllerName.'Controller';

                }else{
                    //获取控制器名
                    $controllerName = ucfirst( empty($urlArray[0])? 'default':$urlArray[0]);
                    $this->controller = '\\app\\Controller\\'.$controllerName.'Controller';
                }
                //获取方法名
                array_shift($urlArray);
                $actionName = empty($urlArray[0])? 'index':$urlArray[0];
                //获取参数
                array_shift($urlArray);
                $params = $urlArray?$urlArray:array();
            }


        $action = $actionName.'Action';

        if(!class_exists($this->controller) || !method_exists($this->controller,$action)){
            header('location:/error/');
            exit;
        }
        $instants = new $this->controller($this->controller,$action);
        call_user_func_array(array($instants,$action),$params);

    }

    //检测并清除自定义全局变量
    public function unregisterGlobals(){
        if(ini_get('register_globals')){
            $globals = array('_GET','_POST','_SERVER','_SESSION','_COOKIE','_REQUEST','_ENV','_FILE');
            foreach($globals as $global){
                foreach ($GLOBALS[$global] as $key => $value){
                    if($value === $key){
                        unset($GLOBALS[$key]);
                    }
                }
            }
        }
    }

    //清除敏感字符
    public function stripSlashesDeep($value){
        $value = is_array($value)?array_map('stripSlashesDeep',$value):stripslashes($value);
        return $value;
    }

    //检测并删除敏感字符
    public function removeMagicQuotes(){
        if(get_magic_quotes_gpc()){
            $_GET = $this->stripSlashesDeep($_GET);
            $_POST = $this->stripSlashesDeep($_POST);
            $_SESSION = $this->stripSlashesDeep($_SESSION);
            $_COOKIE = $this->stripSlashesDeep($_COOKIE);
        }
    }

    //检测调试模式
    public function valiDebug(){
        if(DEBUG==true){
            error_reporting(E_ALL);
            ini_set('display_errors','on');
        }else{
            error_reporting(E_ALL);
            ini_set('display_errors','off');
            ini_set('log_errors','on');
            ini_set('error_log',WEB_ROOT.'/log/error.log');
        }
    }

    //自动加载类
    public function loadClass($class){
        $class = str_replace('\\','/',$class);
        $frameworks = WEB_ROOT.'/core/'.$class.'.php';
        $controllers = WEB_ROOT.'/'.$class.'.php';
        $models = APP_HOME.'/Model/'.$class.'.php';

        if(is_file($frameworks)){
            include $frameworks;
        }elseif(is_file($controllers)){
            include $controllers;
        }elseif(is_file($models)){
            include $models;
        }else{
            header('location:/error/');
            exit;
        }
    }

    //配置数据库信息
    public function setDBconfig(){
        if($this->_config['db']){
            Model::$dbConfig = $this->_config['db'];
        }
    }

}