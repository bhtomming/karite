<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\8\16 0016
 * Time: 10:54
 */

namespace app\Controller\Admin;




class NewsController extends BaseArticleController
{


    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);

        $this->page ="news";
        $this->pagename = "新闻";
        $this->instanst = "app\\Model\\News";
    }

}