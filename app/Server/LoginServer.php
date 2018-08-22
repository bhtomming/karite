<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\9\1 0001
 * Time: 8:38
 */

namespace app\Server;


use app\Model\User;

class LoginServer
{

    public static function isLogin(){
        if(!isset($_COOKIE['karite'])){
            return false;
        }
        $ckuser = explode('#',$_COOKIE['karite']);
        $user = new User();
        $isuser = $user->find()->where(array('id'=>$ckuser[1]));
        if(!$isuser){
            return false;
        }
        if($ckuser[0]!=$isuser['pwd']){
            return false;
        }
        return true;
    }




}