<?php

namespace app\model;

use core\lib\model;

class TableModel extends model
{
    public $table = 'table';
    public function lists()
    {
        $res = $this->select($this->table,'*');
        return $res;
    }


}