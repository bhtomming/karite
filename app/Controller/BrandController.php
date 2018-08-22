<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\9\1 0001
 * Time: 11:54
 */

namespace app\Controller;


class BrandController extends WebController
{

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->model ="app\\Model\\Brand";
        $this->pageclass = "brand";
    }

    public function indexAction(){
        $this->lists('brandtwocllist.twig');
    }

    public function nodeAction($id=1){
        $this->daitel($id,'branddaitel.twig');
    }

}