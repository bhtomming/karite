<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\9\2 0002
 * Time: 11:24
 */

namespace app\Controller;


use app\Server\CsrfTokenServer;

class WordsController extends WebController
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->instanst ="app\\Model\\Words";
        $this->pageclass = "words";
    }

    public function indexAction(){
        $token = CsrfTokenServer::createToken();
        if($_SERVER['REQUEST_METHOD']=="POST"){

            $data['name'] = trim($_POST['name']);
            $data['phone'] = $_POST['tel'];
            $data['address'] = trim($_POST['address']);
            $data['content'] = trim($_POST['content']," \n\t\r\0");
            $token = trim($_POST['csrftoken']);
            $data['createtime'] = date("Y-m-d H:i:s",time());


            if(!CsrfTokenServer::validToken($token)){
                header('reflash');
                $this->message = '请确认您的表单信息无误!';
                $this->status ='bg-danger';
            }else{
                $count = (new $this->instanst)->add($data);
                if($count){
                    header("location:/words/");
                }else{
                    $this->message='添加留言失败，请联系管理员!';
                    $this->status ='bg-danger';
                }
                $this->message='添加留言成功，谢谢留言！';
                $this->status ='bg-success';
            }

        }
        $this->render('contactwords.twig',array(
            'token' => $token,
            'page' =>$this->pageclass
        ));
    }

}