<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\8\9 0009
 * Time: 17:24
 */

namespace admin\model;


class Theme extends WebModel
{
    function __construct()
    {
        $this->table = 'Theme';
        $this->prid =array('tid');
        $this->autoid = 'tid';
    }

    private $name;
    private $dir;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDir()
    {
        return $this->dir;
    }

    /**
     * @param mixed $dir
     */
    public function setDir($dir)
    {
        $this->dir = $dir;
    }
}