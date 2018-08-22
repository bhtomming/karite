<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\9\1 0001
 * Time: 17:47
 */

namespace app\Controller;


class SucaseController extends WebController
{

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->model ="app\\Model\\Sucase";
        $this->pageclass = "sucase";
    }

    public function indexAction(){
        $this->lists('sucaselist.twig');
    }

    public function nodeAction($id=1){
        $this->daitel($id,'sucasedaitel.twig');
    }


}