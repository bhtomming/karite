<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\8\16 0016
 * Time: 10:54
 */

namespace app\Controller\Admin;



class ShowController extends BaseArticleController
{

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->page = "show";
        $this->pagename = "品牌展示";
        $this->instanst = "app\\Model\\Show";
    }

    public function indexAction(){
        $list=(new $this->instanst)->selectAll();
        $imgs ='';
        foreach ($list as $index => $show){
            if(!empty($show['ttimg'])){
                $imgs = explode(',',$show['ttimg']);
                $show['ttimg'] = $imgs;
                $list[$index] = $show;
            }
        }

        $this->render('/admin/showslist.twig',array(
            "brandlist"=>$list,
            "page" =>$this->page,
            "pagename" =>$this->pagename
        ));
    }

    public function addAction(){

        if($_SERVER['REQUEST_METHOD']=="POST"){

            $data['title'] = trim($_POST['title']);
            $data['ttimg'] = rtrim($_POST['imgpath'],',');
            $data['description'] = trim($_POST['description']);
            $data['createtime'] = date("Y-m-d H:i:s",time());
            $data['mdtime'] = $data['createtime'];
            $count = (new $this->instanst)->add($data);
            if($count){
                header("location:/admin/".$this->page);
            }else{
                $this->message='添加信息失败，请联系管理员';
                $this->status ='bg-danger';
            }
        }

        $this->render('/admin/showadd.twig',array(
            "action"=>"/admin/".$this->page."/add",
            "page" =>$this->page,
            "pagename" =>$this->pagename
        ));
    }

    public function editAction($id){
        $this->instanst = new $this->instanst;
        if ($_SERVER['REQUEST_METHOD']=='GET'){
            $ninfo = $this->instanst->select($id);
            $imgs ='';
            if(!empty($ninfo['ttimg'])){
                $imgs = explode(',',$ninfo['ttimg']);
                $ninfo['ttimg'] = $imgs;
            }
            $this->render('/admin/showadd.twig',array(
                'brand'=>$ninfo,
                'action'=>"/admin/".$this->page."/edit/".$id,
                "page" =>$this->page,
                "pagename" =>$this->pagename
            ));
        }
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            $data=[];
            if(!empty($_POST['title'])){
                $data['title'] = trim($_POST['title']);
            }
            if(!empty($_POST['imgpath'])){
                $data['ttimg'] = rtrim($_POST['imgpath'],',');
            }
            if(!empty($_POST['description'])){
                $data['description'] = trim($_POST['description']);
            }
            $data['mdtime'] = date("Y-m-d H:i:s",time());
            $this->instanst->update($id,$data);
            header('location:/admin/'.$this->page);
        }
    }

}