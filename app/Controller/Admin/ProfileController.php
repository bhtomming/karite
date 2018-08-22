<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\8\16 0016
 * Time: 10:54
 */

namespace app\Controller\Admin;



class ProfileController extends BaseArticleController
{


    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);

        $this->page ="profile";
        $this->pagename = "企业简介";
        $this->instanst = "app\\Model\\Profile";
    }

}