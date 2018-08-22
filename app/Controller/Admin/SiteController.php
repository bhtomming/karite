<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\8\15 0015
 * Time: 17:11
 */

namespace app\Controller\Admin;


use app\Controller\Controller;
use app\Model\Site;

class SiteController extends Controller
{
    protected $instanst ="app\\Model\\Site";
    public function indexAction(){

        $this->instanst = new $this->instanst;
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $data['logo'] = $_POST['logopath'];
            $data['name'] = trim($_POST['sitename']);
            $data['slogan'] = trim($_POST['slogan']);
            $data['domain'] = $_POST['domain'];
            $data['fujian'] = trim($_POST['fujian']);
            $data['email'] = trim($_POST['email']," \n\t\r\0");
            $data['keywords'] = trim($_POST['keywords']);
            $data['beian'] = trim($_POST['beian']);
            $data['description'] = trim($_POST['description']);
            $data['copyright'] =trim($_POST['copyright']);
            $data['tel'] =trim($_POST['tel']);
            $data['createtime'] = date("Y-m-d H:i:s",time());
            $data['mdtime'] = $data['createtime'];
            $jilu = $this->instanst->selectAll();
            $count="";
            if(empty($jilu)){
                $count = $this->instanst->add($data);
            }else{
                $count = $this->instanst->update(1,$data);
            }
            if($count){
                $this->message = '设置网站信息成功!';
                $this->status ='bg-success';
            }else{
                $this->message='设置信息失败，请联系管理员';
                $this->status ='bg-danger';
            }
        }

        $this->render('/admin/websetting.twig',array());
    }

    public function setLinkAction(){
        $this->render('/admin/linkset.twig',array());
    }

    public function setImageAction(){
        $this->render('/admin/imgset.twig',array());
    }

    public function setUpfileAction(){
        $this->render('/admin/upset.twig',array());
    }

}