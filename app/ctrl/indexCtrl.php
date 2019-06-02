<?php

namespace app\ctrl;

use core\lib\conf;
use core\lib\model;
use ORM;

new model();

class indexCtrl extends \core\agegg
{

    //view
    public function index()
    {

//        dump($_SERVER);
        $data = 'Hello world';
        $title = '视图文件';
        $this->assign('data',$data);
        $this->assign('title',$title);
        $this->display('index.html');

    }

    //pdo
    public function test()
    {
        p('it is test');
        $model = new \core\lib\model();
        $sql = "select * from `table`";
        $ret = $model->query($sql);
        p($ret->fetchAll());
    }

    //medoo
    public function medoo()
    {
        $model = new model();
        dump($model);
//        $data = $model->select('table','*');

        $data = array(
            'name'=>'AGEGG',
            'sort'=>1
        );
        $res = $model->insert('table',$data);
        dump($res);
    }

    //app/model
    public function model()
    {
        $model = new \app\model\TableModel();
        $result = $model->lists();
        dump ($result);
    }

    //idiorm
    public function idiorm()
    {
        $result = ORM::forTable('table')->where('id',1)->find_array();
        dump($result);

    }
}