<?php

namespace app\ctrl;

class indexCtrl extends \core\agegg
{
    public function index()
    {
//        p('it is index');
        $temp = \core\lib\conf::get('CTRL','route');
        $temp = \core\lib\conf::get('ACTION','route');
        p($temp);
        $data = 'Hello world';
        $title = '视图文件';
        $this->assign('data',$data);
        $this->assign('title',$title);
        $this->display('index.html');

    }

    public function test()
    {
        p('it is test');
        $model = new \core\lib\model();
        $sql = "select * from `table`";
        $ret = $model->query($sql);
        p($ret->fetchAll());
    }
}