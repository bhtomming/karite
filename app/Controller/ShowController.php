<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\9\2 0002
 * Time: 11:03
 */

namespace app\Controller;


class ShowController extends WebController
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->model ="app\\Model\\Show";
    }

    public function indexAction(){
        $this->lists('brandthreelist.twig');
    }

    public function nodeAction($id){
        $this->daitel($id,'branddaitel.twig');
    }

}