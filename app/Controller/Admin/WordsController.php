<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\8\16 0016
 * Time: 10:54
 */

namespace app\Controller\Admin;



use app\Controller\Controller;

class WordsController extends Controller
{

    protected $instanst;

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->instanst= 'app\\Model\\Words';
        $this->page ='words';
        $this->pagename = '在线留言';
    }

    public function indexAction(){
        $list=(new $this->instanst)->selectAll();
        $this->render('/admin/wordslist.twig',array(
            "newslist"=>$list,
            "page" =>$this->page,
            "pagename" =>$this->pagename
        ));
    }

}