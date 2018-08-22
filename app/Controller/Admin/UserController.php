<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\8\16 0016
 * Time: 16:53
 */

namespace app\Controller\Admin;


use app\Controller\Controller;
use app\Model\User;

class UserController extends Controller
{
    //protected $message;
    protected $instants;

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->instants = new User();
    }

    public function indexAction(){
        //$user = new User();
        $userlist = $this->instants->selectAll();
        $this->render('/admin/userlist.twig',array('users'=>$userlist));
    }

    //添加用户
    public function addAction(){
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $data['name'] = trim($_POST['uname']);
            $data['pwd'] = trim($_POST['pwd']);
            if(preg_match('/^\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/', $_POST['email'])){
                    $data['email'] =$_POST['email'];
            }
            if(preg_match('/^0?(13|14|15|18)[0-9]{9}/',$_POST['phone'])){
                $data['phone'] = $_POST['phone'];
            }
            $num = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.1234567890@";
            $salt = sha1($num);
            $data['pwd'] = md5(md5($data['pwd']).$salt);
            $data['salt'] = $salt;
            $data['createtime'] = date("Y-m-d H:i:s",time());
            //$user = new User();
            $count = $this->instants->add($data);
            if($count){
                header("location:/user");
            }else{
                $this->message='添加用户失败，请联系管理员';
            }

        }

        $this->render('/admin/useradd.twig',array('message'=>$this->message));
    }

    public function editAction($id){
        //$user = new User();
        $uinfo="";
        if ($_SERVER['REQUEST_METHOD']=='GET'){
            $uinfo = $this->instants->select($id);
            $this->render('/admin/useredit.twig',array(
                'user'=>$uinfo,
            ));
        }
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            $data=[];
            if(!empty($_POST['uname'])){
                $data['name'] = trim($_POST['uname']);
            }
            if(!empty($_POST['oldpwd']) && !empty($_POST['pwd']) && !empty($_POST['repwd'])){
                if($_POST['oldpwdv']==$_POST['oldpwd']){
                    if($_POST['pwd']==$_POST['repwd']){
                        $data['pwd'] = trim($_POST['pwd']);
                    }
                }
            }
            if(!empty($_POST['email'])){
                $data['email'] = trim($_POST['email']);
            }
            if(!empty($_POST['phone'])){
                $data['phone'] = trim($_POST['phone']);
            }
            $this->instants->update($id,$data);
            header('location:/admin/user');
        }

    }

  /*  public function loginAction(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $uname = trim($_POST['uname']);
            $pwd = trim($_POST['pwd']);

            $user = new User();
            $rs = $user->find()->where(array(
                'name'=>$uname
                ));
            var_dump($rs);
            if($rs){
                $salepwd = md5(md5($pwd).$rs['salt']);

                if(strcmp($salepwd,$rs['pwd'])==0){
                    setcookie('karite',$salepwd."#".$rs['id'],time()+3600,"/");
                    header('location:/admin');

                }
                $this->message="请输入正确的用户名密码";
            }else{
                $this->message="请输入正确的用户名密码";
            }
        }
        $this->render('/admin/userlogin.twig',array(
            'message'=>$this->message,
        ));
    }*/

    //删除用户数据
    public function delAction($id){
        //$user = new User();
        $this->instants->delete($id);
        echo "已经删除用户id=".$id."的用户信息，3秒后自动跳回用户列表";
        header('Refresh:3;url=/admin/user');
    }

    //退出登录
    public function logoutAction(){
        unset($_COOKIE['karite']);
        header('location:/user/login');
    }

}