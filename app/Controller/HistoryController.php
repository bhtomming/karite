<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\9\2 0002
 * Time: 11:18
 */

namespace app\Controller;


class HistoryController extends WebController
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->model ="app\\Model\\History";
        $this->pageclass = "history";
    }

    public function indexAction(){
        //$this->lists('daitel.twig');
        $this->nodeAction();
    }

    public function nodeAction($id=1){
        $this->daitel($id,'daitel.twig');
    }

}