<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\9\2 0002
 * Time: 11:14
 */

namespace app\Controller;


class NewsController extends WebController
{

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->model ="app\\Model\\News";
        $this->pageclass = "news";
    }

    public function indexAction(){
        $this->lists('list.twig');
    }

    public function nodeAction($id){
        $this->daitel($id,'daitel.twig');
    }
}