<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\9\2 0002
 * Time: 11:22
 */

namespace app\Controller;


class NoticeController extends WebController
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->model ="app\\Model\\Notice";
        $this->pageclass = "notice";
    }

    public function indexAction(){
        $this->nodeAction();
    }

    public function nodeAction($id=1){
        $this->daitel($id,'sucasedaitel.twig');
    }

}