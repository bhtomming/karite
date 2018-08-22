<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\9\2 0002
 * Time: 10:51
 */

namespace app\Controller;


class ActivityController extends WebController
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->model ="app\\Model\\Activity";
        $this->pageclass = "activity";
    }

    public function indexAction(){
        $this->lists('brandlist.twig');
    }

    public function nodeAction($id=1){
        $this->daitel($id,'branddaitel.twig');
    }

}