<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\8\14 0014
 * Time: 14:50
 */

namespace app\Controller;


class DefaultController extends WebController
{
    public function indexAction(){
        $this->render('index.twig',array());
    }

    public function loginAction(){
        $this->render('/admin/userlogin.twig',array(
            'message'=>$this->message,
        ));
    }

}