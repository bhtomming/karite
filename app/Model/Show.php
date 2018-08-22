<?php
/**
 * Created by Drupai.
 * User: 烽行天下
 * Date: 2017\8\31 0031
 * Time: 15:14
 */

namespace app\Model;


use core\Model;

class Show extends Model
{
    protected $title;
    public function __construct()
    {
        $this->_table = 'shows';
        parent::__construct();

    }

}