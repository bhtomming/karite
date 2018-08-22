<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\9\2 0002
 * Time: 16:18
 */

namespace app\Server;


class CsrfTokenServer
{
    public static function createToken(){
        $ip=CsrfTokenServer::getIp();
        $token = md5($ip);
        return $token;
    }

    public static function validToken($token){
        $ip=CsrfTokenServer::createToken();
        if($ip != $token || empty($token)){
            return false;
        }else{
            return true;
        }
    }

    public static function getIp(){
        $ip = "";
        if (getenv("HTTP_CLIENT_IP"))
            $ip = getenv("HTTP_CLIENT_IP");
        else if(getenv("HTTP_X_FORWARDED_FOR"))
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        else if(getenv("REMOTE_ADDR"))
            $ip = getenv("REMOTE_ADDR");
        else $ip = "Unknow";
        return $ip;
    }

}