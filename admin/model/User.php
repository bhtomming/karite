<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\8\9 0009
 * Time: 17:05
 */

namespace admin\model;


class User extends WebModel
{
    private $uname;
    private $email;
    private $pwd;

    public function __construct(){
        $this->table = 'user';
        $this->prid = array('uid');
        $this->autoid = 'uid';
    }

    /**
     * @return mixed
     */
    public function getUname()
    {
        return $this->uname;
    }

    /**
     * @param mixed $uname
     */
    public function setUname($uname)
    {
        $this->uname = $uname;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * @param mixed $pwd
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;
    }

}