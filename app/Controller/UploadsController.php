<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\8\29 0029
 * Time: 16:40
 */

namespace app\Controller;


use app\Model\Site;

class UploadsController extends Controller
{

    public function indexAction(){

        //$site = (new Site())->selectAll();
       // var_dump($site);
        $imgName = $_FILES["ttimg"]["name"];
        $allowType =['jpg','gif','png','jpeg'];
        $imgType = explode("/",$_FILES["ttimg"]["type"]);
        $img = $_FILES["ttimg"]["tmp_name"];
        $size = $_FILES["ttimg"]["size"];
        $path = "upload/images/";
        $fileNewName =date("YmdHis");
        echo $fileNewName;

        if(!file_exists($path)){
             mkdir($path,0777,true);
             chmod($path,0777);
        }
        $imgType = strtolower(end($imgType));
        if(in_array($imgType,$allowType) && $size<819200){
            $path=WEB_PUBLIC.$path.$imgName;
            move_uploaded_file($img,iconv("utf-8","gbk",$path));

            return 1;
        }else{
            $this->message='请选择符合规格的图片';
            $this->status ='bg-danger';
            return -1;
        }

    }

    public function logoAction(){

        $imgName = $_FILES["logo"]["name"];
        $allowType =['jpg','gif','png','jpeg'];
        $imgType = explode("/",$_FILES["logo"]["type"]);
        $img = $_FILES["logo"]["tmp_name"];
        $size = $_FILES["logo"]["size"];
        $path = "upload/images/";
        $fileNewName =date("YmdHis");
        echo $fileNewName;

        if(!file_exists($path)){
            mkdir($path,0777,true);
            chmod($path,0777);
        }
        $imgType = strtolower(end($imgType));
        if(in_array($imgType,$allowType) && $size<819200){
            $path=WEB_PUBLIC.$path.$imgName;
            move_uploaded_file($img,iconv("utf-8","gbk",$path));

            return 1;
        }else{
            $this->message='请选择符合规格的图片';
            $this->status ='bg-danger';
            return -1;
        }
    }

    public function brandAction(){
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        {
            //var_dump($_FILES['ttimg']['name']);
            $images_name =$_FILES['ttimg']['name'];
            //$img_name = time();
            $img_path ="upload/images/";
            $tmp_name = $_FILES['ttimg']['tmp_name'];
            if(!file_exists($img_path)){
                mkdir($img_path,0777,true);
                chmod($img_path,0777);
            }
            $fileNewName =date("YmdHis");
            echo $fileNewName;
            move_uploaded_file($tmp_name,$img_path.$images_name);

           /* foreach($_FILES['ttimg']['tmp_name'] as$k=>$v)
            {
                move_uploaded_file($v,$img_path.$img_name.$k.'.jpg');
                $images_name  .=  $img_name.$k.'.jpg'.',';
            }*/
        }
        return 1;
    }
}