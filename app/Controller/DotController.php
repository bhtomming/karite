<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\9\2 0002
 * Time: 11:17
 */

namespace app\Controller;


class DotController extends WebController
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->model ="app\\Model\\Dot";
        $this->pageclass = "dot";
    }

    public function indexAction(){
        //$this->lists('daitel.twig');
        $this->nodeAction();
    }

    public function nodeAction($id=1){
        $this->daitel($id,'daitel.twig');
    }
}