<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\8\9 0009
 * Time: 17:04
 */

namespace admin\model;




class WebModel
{
    public $table;
    public $prid = array();
    public $autoid;
    public $path=DPCMS_CORE;

    public function __construct()
    {

    }




    /**
     * @return mixed
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param mixed $table
     */
    public function setTable($table)
    {
        $this->table = $table;
    }

    /**
     * @return array
     */
    public function getPrid()
    {
        return $this->prid;
    }

    /**
     * @param array $prid
     */
    public function setPrid($prid)
    {
        $this->prid = $prid;
    }

    /**
     * @return mixed
     */
    public function getAutoid()
    {
        return $this->autoid;
    }

    /**
     * @param mixed $autoid
     */
    public function setAutoid($autoid)
    {
        $this->autoid = $autoid;
    }

}