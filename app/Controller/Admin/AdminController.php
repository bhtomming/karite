<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\8\15 0015
 * Time: 15:58
 */

namespace app\Controller\Admin;

use app\Controller\Controller;
use app\Model\Activity;
use app\Model\News;
use app\Model\Sucase;
use app\Model\Words;

class AdminController extends Controller
{
     public function indexAction(){

         $newscount = (new News())->countwz();
         $activitycount = (new Activity())->countwz();
         $sucasecount = (new Sucase()) ->countwz();
         $wordscount = (new Words())->countwz();
       $this->render('/admin/indexsdfdf.twig',array(
             'news'=>"$newscount",
             'huodong' =>$activitycount,
             'anli' =>$sucasecount,
             'liuyan' =>$wordscount
         ));
    }
}