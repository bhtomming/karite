<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\8\5 0005
 * Time: 15:30
 */
if(version_compare(PHP_VERSION,'5.0.0','>')){
    define('DPCMS_INST', dirname(__FILE__));
    define('DPCMS_CORE', dirname(DPCMS_INST));
    define('DPCMS_ROOT', dirname(DPCMS_CORE));
    define('APP_NAME', basename(DPCMS_CORE));

    //检测是否已经安装过
    if(is_file(DPCMS_ROOT.'/admin/install/lockinstall.txt')){
        include DPCMS_ROOT.'/admin/install/lockinstall.txt';
        exit;
    }

    $step = isset($_GET['step'])&&in_array($_GET['step'],array('reade','check_env','check_db','complete'))?$_GET['step']:'reade';
    include DPCMS_INST.'/func.php';
    if($step=='reade'){
        include DPCMS_INST.'/reade.php';
    }else if($step == 'check_env'){
        include DPCMS_INST.'/check_env.php';
    }else if($step =='check_db'){
        include DPCMS_INST.'/check_db.php';
    }else if($step == 'complete'){
        //获取提交内容
        $host = isset($_POST['dbhost'])?trim($_POST['dbhost']):"";
        $user = isset($_POST['dbuser'])?trim($_POST['dbuser']):"";
        $passWord = isset($_POST['dbpw'])?trim($_POST['dbpw']):"";
        $port = isset($_POST['dbport'])?trim($_POST['dbport']):"";
        $dbname = isset($_POST['dbname'])?trim($_POST['dbname']):"";
        $prefix = isset($_POST['dbpre'])?trim($_POST['dbpre']):"";
        $admuser = isset($_POST['adm_user'])?trim($_POST['adm_user']):"";
        $admpwd = isset($_POST['adm_pass'])?trim($_POST['adm_pass']):"";
        $charset = 'utf8';

        if(class_exists('mysqli')){
            $link = new mysqli($host,$user,$passWord);

            if(!$link){
                echo '数据库密码错误';
            }

            try{
                mysqli_set_charset($link,'utf8');
                mysqli_select_db($link,$dbname);
                $link->select_db($dbname);
                if(mysqli_errno($link)==1049){
                    mysqli_query($link,"create database $dbname DEFAULT CHARACTER SET $charset");
                    if(!mysqli_select_db($link,$dbname)){
                        echo '创建数据库失败!';
                    }
                    echo '创建数据库'.$dbname.'<br\>';
                }

            }catch(Exception $e){
                echo '出错了'.$e;
            }
        }

        echo '安装完成，请登录后台';
    }




    echo '目前的环境适合搭建';
}else{
    echo '你的php版本号太低，请升级到5.0以上,你目前的PHP版本号是:'.PHP_VERSION;
}
