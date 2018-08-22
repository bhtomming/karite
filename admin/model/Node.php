<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\8\9 0009
 * Time: 17:23
 */

namespace admin\model;


class Node extends WebModel
{
    function __construct()
    {
        $this->table = 'Node';
        $this->prid =array('nid');
        $this->autoid = 'nid';
    }

    private $title;
    private $ttpic;
    private $keyword;
    private $description;
    private $level;
    private $pubish;
    private $summary;
    private $content;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTtpic()
    {
        return $this->ttpic;
    }

    /**
     * @param mixed $ttpic
     */
    public function setTtpic($ttpic)
    {
        $this->ttpic = $ttpic;
    }

    /**
     * @return mixed
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * @param mixed $keyword
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return mixed
     */
    public function getPubish()
    {
        return $this->pubish;
    }

    /**
     * @param mixed $pubish
     */
    public function setPubish($pubish)
    {
        $this->pubish = $pubish;
    }

    /**
     * @return mixed
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param mixed $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
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

}