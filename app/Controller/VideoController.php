<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\9\2 0002
 * Time: 11:18
 */

namespace app\Controller;


class VideoController extends WebController
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->model ="app\\Model\\Video";
        $this->pageclass = "video";
    }

    public function indexAction(){
        //$this->lists('list.twig');
        $this->nodeAction();
    }

    public function nodeAction($id=1){
        $this->daitel($id,'daitel.twig');
    }

}