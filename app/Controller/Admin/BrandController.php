<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\8\16 0016
 * Time: 10:54
 */

namespace app\Controller\Admin;



class BrandController extends BaseArticleController
{

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->page = "brand";
        $this->pagename = "品牌介绍";
        $this->instanst = "app\\Model\\Brand";
    }

    public function indexAction(){
        $list=(new $this->instanst)->selectAll();
        $this->render('/admin/brandslist.twig',array(
            "newslist"=>$list,
            "page" =>$this->page,
            "pagename" =>$this->pagename
        ));
    }

    public function addAction()
    {
        if($_SERVER['REQUEST_METHOD']=="POST"){

            $data['title'] = trim($_POST['title']);
            $data['ttimg'] = $_POST['imgpath'];
            $data['description'] = trim($_POST['description']);
            $data['website'] = trim($_POST['website']);
            $data['special'] = trim($_POST['special']);
            $data['createtime'] = date("Y-m-d H:i:s",time());
            $data['mdtime'] = $data['createtime'];
            $count = (new $this->instanst)->add($data);
            if($count){
                header("location:/admin/".$this->page);
            }else{
                $this->message='添加新闻失败，请联系管理员';
                $this->status ='bg-danger';
            }
        }
        $this->render('/admin/brandadd.twig',array(
            "action"=>"/admin/".$this->page."/add",
            "page" =>$this->page,
            "pagename" =>$this->pagename
        ));
    }

    public function editAction($id){
        $this->instanst = new $this->instanst;
        if ($_SERVER['REQUEST_METHOD']=='GET'){
            $ninfo = $this->instanst->select($id);
            $this->render('/admin/brandadd.twig',array(
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
                $data['ttimg'] = trim($_POST['imgpath']);
            }
            if(!empty($_POST['description'])){
                $data['description'] = trim($_POST['description']);
            }
            if(!empty($_POST['special'])){
                $data['special'] = trim($_POST['special']);
            }
            if(!empty($_POST['website'])){
                $data['website'] = trim($_POST['website']);
            }

            $data['mdtime'] = date("Y-m-d H:i:s",time());
            $this->instanst->update($id,$data);
            header('location:/admin/'.$this->page);
        }
    }

}