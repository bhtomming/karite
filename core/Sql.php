<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\8\18 0018
 * Time: 8:57
 */

namespace core;


class Sql
{
    protected $_dbHandle;
    protected $_result;
//    protected $_table;
    private $fitter = '';

    public function connect($host, $dbname, $username, $pwd)
    {
        try {
            $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8', $host, $dbname);
            $option = array(\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC);
            $this->_dbHandle = new \PDO($dsn, $username, $pwd, $option);

        } catch (\PDOException $e) {
            if($e->getCode()==1049){//如果数据库不存在就创建数据库
                $dsn = sprintf('mysql:host=%s;charset=utf8', $host);
                $option = array(\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC);
                $this->_dbHandle = new \PDO($dsn, $username, $pwd, $option);
                $sql = sprintf('create database %s',$dbname);
                $this->_dbHandle->query($sql);

                echo '创建数据库'.$dbname.'成功<br\>';
            }else{
                echo('连接数据库发生错误:');
            }

        }
    }

    //创建数据表
    public function create(){
        $this->_model = get_class($this);
        $this->_table = strtolower($this->_model);
        $this->_dbHandle->query('create table '.$this->_table);
    }

    //按条件查找
    public function find(){
        $this->fitter = sprintf("select * from %s",$this->_table);
        return $this;
    }

    //查询条件
    public function where($where = array())
    {
        if (isset($where)) {
            $this->fitter .= " where ";
            //$this->fitter .= implode(' ', $where);
            foreach ($where as $key => $value) {
                $this->fitter .= $key."='".$value."'";
            }
        }
        /*$sql = sprintf("select * from %s where %s = '%s'",$this->_table,$where['field'],$where['value']);*/
        $sth = $this ->_dbHandle->prepare($this->fitter);
        $sth -> execute();
        return $sth->fetch();
    }

    //排序条件
    public function order($order = array())
    {
        if (isset($order)) {
            $this->fitter .= 'ORDER BY ';
            $this->fitter .= implode(',', $order);
        }
        return $this;
    }

    //查询所有
    public function selectAll()
    {
        $sql = sprintf("select * from %s %s", $this->_table, $this->fitter);
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

    //ID查询条件
    public function select($id)
    {
        $sql = sprintf("select * from %s where id = '%s'", $this->_table, $id);
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->fetch();
    }

    //根据条件(Id)删除
    public function delete($id)
    {
        $sql = sprintf("delete from %s where id='%s'", $this->_table, $id);
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->rowCount();
    }

    //自定义查询语句
    public function query($sql){
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->rowCount();
    }

    //向数据库插入数据
    public function add($data){
        $sql = sprintf("insert into %s%s ",$this->_table,$this->insertFormat($data));
        return $this->query($sql);
    }

    //更新数据库内容
    public function update($id,$data){
        $sql = sprintf("update %s set %s where `id` = '%s'",$this->_table,$this->updateFormat($data),$id);
        return $this->query($sql);
    }

    //将数组转换成插入格式的sql语句
    public function insertFormat($data){
        $fields = array();
        $values = array();

        foreach ($data as $key => $value){
            $fields[] = sprintf('%s',$key);
            $values[] = sprintf('%s',$value);
        }
        $field = implode(',',$fields);
        $value = "'".implode("','",$values)."'";
        return sprintf("(%s) values(%s)",$field,$value);
    }

    //将数组转换成更新格式的sql语句
    public function updateFormat($data){
        $field = array();
        foreach($data as $key => $value){
            $field[] = sprintf("%s = '%s', ",$key,$value);
        }
        $field =implode($field);
        $field =rtrim($field,", ");
        return $field;
    }
}