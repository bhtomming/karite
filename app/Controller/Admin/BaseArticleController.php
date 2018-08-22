<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\8\16 0016
 * Time: 10:54
 */

namespace app\Controller\Admin;


use app\Controller\Controller;

class BaseArticleController extends Controller
{
    protected $page;
    protected $pagename;
    protected $instanst;

    public function indexAction(){
        $list=(new $this->instanst)->selectAll();
        $this->render('/admin/newslist.twig',array(
            "newslist"=>$list,
            "page" =>$this->page,
            "pagename" =>$this->pagename
        ));
    }

    public function addAction(){

        if($_SERVER['REQUEST_METHOD']=="POST"){

            $data['title'] = trim($_POST['title']);
            $data['ttimg'] = $_POST['imgpath'];
            $data['summary'] = trim($_POST['summary']);
            $data['content'] = trim($_POST['content']," \n\t\r\0");
            $data['author'] = trim($_POST['author']);
            $data['keywords'] = trim($_POST['keywords']);
            $data['description'] = trim($_POST['description']);
            $data['createtime'] = date("Y-m-d H:i:s",time());
            $data['mdtime'] = $data['createtime'];

            $data['content'] = $this->trim_script($data['content']);
            $count = (new $this->instanst)->add($data);
            if($count){
                header("location:/admin/".$this->page);
            }else{
                $this->message='添加新闻失败，请联系管理员';
                $this->status ='bg-danger';
            }
        }
        $this->render('/admin/newsadd.twig',array(
            "action"=>"/admin/".$this->page."/add",
            "page" =>$this->page,
            "pagename" =>$this->pagename
        ));
    }

    public function editAction($id){
        $this->instanst = new $this->instanst;
        if ($_SERVER['REQUEST_METHOD']=='GET'){
            $ninfo = $this->instanst->select($id);
            $this->render('/admin/newsadd.twig',array(
                'news'=>$ninfo,
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
            if(!empty($_POST['summary'])){
                $data['summary'] = trim($_POST['summary']);
            }
            if(!empty($_POST['content'])){
                $data['content'] = trim($_POST['content']);
            }
            if(!empty($_POST['author'])){
                $data['author'] = trim($_POST['author']);
            }
            if(!empty($_POST['keywords'])){
                $data['keywords'] = trim($_POST['keywords']);
            }
            if(!empty($_POST['description'])){
                $data['description'] = trim($_POST['description']);
            }
            $data['mdtime'] = date("Y-m-d H:i:s",time());
            $this->instanst->update($id,$data);
            header('location:/admin/'.$this->page);
        }
    }

    public function trim_script($str) {
        if(is_array($str)){
            foreach ($str as $key => $val){
                $str[$key] = trim_script($val);
            }
        }else{
            $str = preg_replace ( '/\<([\/]?)script([^\>]*?)\>/si', '&lt;\\1script\\2&gt;', $str );
            $str = preg_replace ( '/\<([\/]?)iframe([^\>]*?)\>/si', '&lt;\\1iframe\\2&gt;', $str );
            $str = preg_replace ( '/\<([\/]?)frame([^\>]*?)\>/si', '&lt;\\1frame\\2&gt;', $str );
            $str = str_replace ( 'javascript:', 'javascript：', $str );
        }
        return $str;
    }

    public function delAction($id){
        echo "已经删除文章id=".$id."的文章信息，3秒后自动跳回文章列表";
        $instanst =new $this->instanst();
        $instanst->delete($id);
        header('Refresh:3;url=/admin/'.$this->page);
    }

}