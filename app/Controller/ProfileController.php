<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\9\1 0001
 * Time: 14:45
 */

namespace app\Controller;


class ProfileController extends WebController
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->model ="app\\Model\\Profile";
        $this->pageclass = "profile";
    }
    public function indexAction(){
        $this->nodeAction();
    }

    public function nodeAction($id=1){
        $this->daitel($id,'daitel.twig');
    }

}