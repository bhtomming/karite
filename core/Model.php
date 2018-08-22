<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\8\18 0018
 * Time: 10:43
 */

namespace core;


class Model extends Sql
{
    protected $_table;
    protected $_model;
    public static $dbConfig = [];

    public function __construct(){
        //连接数据库
        $this->connect(self::$dbConfig['host'],self::$dbConfig['dbname'],self::$dbConfig['username'],self::$dbConfig['pwd']);
        //获取数据表名
        if(!$this->_table){
            //取得当前模型名称,包含命名空间
            $this->_model = get_class($this);

            //去除命名空间
            $models = substr($this->_model,strrpos($this->_model,'\\')+1);

            //保持数据表名与模型名一致
            $this->_table = strtolower($models);
        }

       // $sql = sprintf("create table if not exists %s('%s')");
    }

    public function countwz(){
        $sql = sprintf("select * from %s",$this->_table);
        $number = $this->query($sql);
        return $number;
    }

}