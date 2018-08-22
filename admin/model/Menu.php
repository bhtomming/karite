<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\8\9 0009
 * Time: 17:23
 */

namespace admin\model;


class Menu extends WebModel
{
    private $content;
    private $path;

    function __construct()
    {
        $this->table = 'menu';
        $this->prid =array('mid');
        $this->autoid = 'mid';
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

}