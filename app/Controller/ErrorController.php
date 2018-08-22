<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\9\2 0002
 * Time: 14:18
 */

namespace app\Controller;


class ErrorController extends WebController
{
    public function indexAction(){

        header('HTTP/1.1 404 Not Found');
        $this->render('404.twig',array());
    }

}