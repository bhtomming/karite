<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\9\1 0001
 * Time: 11:34
 */

namespace app\Controller;


class WebController extends Controller
{
    protected $model ="";
    protected $pageclass;

    public function lists($template){
        $this->model = new $this->model;
        $lists = $this->model->selectAll();
        foreach ( $lists as $key=>$list){

            if(strpos($list['ttimg'],',')!=false){
                $imgs = explode(',',$list['ttimg']);
                $list['ttimg'] =$imgs;
                $lists[$key] = $list;
            }
        }
        $this->render($template,array(
            'lists' => $lists,
            'page' =>$this->pageclass
        ));
    }

    public function daitel($id=1,$template){
        $menu = new $this->model;
        $item = $menu->find()->where(array('id'=>$id));
        $this->render($template,array('item' => $item,'page' =>$this->pageclass));
    }

    public function fenlei($menu,$param=array(),$template=array()){
        if(!empty($param)){
            $this->daitel($menu,$param[0],$template['daitel']);
        }else{
            $this->lists($menu,$template['list']);
        }
    }

}