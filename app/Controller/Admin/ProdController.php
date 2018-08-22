<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\8\16 0016
 * Time: 14:51
 */

namespace app\Controller\Admin;


use app\Controller\Controller;

class ProdController extends Controller
{
    public function indexAction(){
        $this->render('/admin/prodlist.twig',array());
    }

    public function addAction(){
        $this->render('/admin/prodadd.twig',array());
    }

    public function editAction(){
        $this->render('/admin/prodadd.twig',array());
    }
}