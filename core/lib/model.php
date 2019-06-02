<?php
//
//namespace core\lib;
//use core\lib\conf;
//
//class model extends \Medoo\Medoo
//{
//    public function __construct()
//    {
////        $database = conf::all('database');
////        try {
////            parent::__construct($database['DSN'], $database['USERNAME'], $database['PASSWD']);
////        } catch(\PDOException $e) {
////            p($e->getMessage());
////        }
//
//        $option = conf::all('database');
//        parent::__construct($option);
//
//    }
//
//}

namespace core\lib;
use core\lib\conf;
use ORM;

class model
{
    public function __construct()
    {
        $database = conf::all('database');
        ORM::configure($database['DSN']);
        ORM::configure('username', $database['USERNAME']);
        ORM::configure('password', $database['PASSWD']);
    }

}
