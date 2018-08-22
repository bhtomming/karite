<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\8\16 0016
 * Time: 10:54
 */

namespace app\Controller\Admin;



class SucaseController extends BaseArticleController
{

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->page = "sucase";
        $this->pagename = "成功案例";
        $this->instanst = "app\\Model\\Sucase";
    }

}