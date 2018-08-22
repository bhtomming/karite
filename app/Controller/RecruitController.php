<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\9\2 0002
 * Time: 11:27
 */

namespace app\Controller;


class RecruitController extends WebController
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->model ="app\\Model\\Recruit";
        $this->pageclass = "recruit";
    }

    public function indexAction(){
        $this->lists('contactlist.twig');
    }

    public function nodeAction($id){
        $this->daitel($id,'contactdaitel.twig');
    }

}