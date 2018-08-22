<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\9\2 0002
 * Time: 11:21
 */

namespace app\Controller;


class HzcenterController extends WebController
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->model ="app\\Model\\Hzcenter";
        $this->pageclass = "hzcenter";
    }

    public function indexAction(){
        $this->lists('sucaselist.twig');
    }

    public function nodeAction($id=1){
        $this->daitel($id,'sucasedaitel.twig');
    }

}