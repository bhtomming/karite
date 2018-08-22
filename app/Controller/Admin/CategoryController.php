<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\8\16 0016
 * Time: 8:39
 */

namespace app\Controller\Admin;


use app\Controller\Controller;
use app\Model\Category;

class CategoryController extends Controller
{
    public function indexAction(){
        $category = new Category();
        $rows = $category->selectAll();
        $this->render('admin/category.twig',array(
            'categorys' => $rows,
        ));
    }

    public function addAction(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $data['ename']= $_POST['ename'];
            $data['name']= $_POST['name'];
            $data['description']= $_POST['description'];
            $data['seotitle']= $_POST['seotitle'];
            $data['seokeyword']= $_POST['seokeyword'];
            $category = new Category();
            $count = $category->add($data);
            if($count){
                header('location=/admin/Category');
            }
        }
        $this->render('admin/addcategory.twig',array());
    }

    public function editAction($id){
        $category = new Category();
        if ($_SERVER['REQUEST_METHOD']=='GET'){
            $uinfo = $category->select($id);
            $this->render('/admin/categoryedit.twig',array(
                'category'=>$uinfo,
            ));
        }
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            $data=[];
            if(!empty($_POST['ename'])){
                $data['ename'] = trim($_POST['ename']);
            }
            if(!empty($_POST['name'])){
                $data['name'] = trim($_POST['name']);
            }
            if(!empty($_POST['description'])){
                $data['description'] = trim($_POST['description']);
            }
            if(!empty($_POST['seotitle'])){
                $data['seotitle'] = trim($_POST['seotitle']);
            }
            if(!empty($_POST['seokeyword'])){
                $data['seokeyword'] = trim($_POST['seokeyword']);
            }
            $category->update($id,$data);
            header('location:/admin/category');
        }

    }

    //删除分类数据
    public function delAction($id){
        $category = new Category();
        $category->delete($id);
        echo "已经删除分类id=".$id."的用户信息，3秒后自动跳回分类列表";
        header('Refresh:3;url=/admin/category');
    }

}