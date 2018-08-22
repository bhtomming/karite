<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\9\1 0001
 * Time: 18:07
 */

namespace app\Controller;


class ContactController extends WebController
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->model ="app\\Model\\Contact";
        $this->pageclass = "contact";
    }

    public function indexAction(){
        $this->daitel(1,'contactdaitel.twig');
    }

}