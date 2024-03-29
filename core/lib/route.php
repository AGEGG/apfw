<?php

namespace core\lib;
use core\lib\conf;

class route
{
    public $ctrl; //控制器
    public $action; //方法
    public function __construct()
    {
        /** 测试用例 ：http://agegg.cn/index/index/id/1/str/2
         * 1.隐藏index.php
         * 2.获取到URL参数部分
         * 3.返回对应控制器和方法
         */
//        p($_SERVER);
        if($_SERVER['REQUEST_URI'] && $_SERVER['REQUEST_URI'] != '/') { //http://agegg.cn  $_SERVER['REQUEST_URI']为 '/'
            $path = $_SERVER['REQUEST_URI'];//  打印得到/index/index/id/1/str/2
            $patharr = explode('/',trim($path,'/')); //去除最左面'/',分割成为数组
            if(isset($patharr[0])) {//有控制器
                $this->ctrl = $patharr[0];
            }
            unset($patharr[0]); //为获取参数去掉控制器
            if(isset($patharr[1])) { //有方法
                $this->action = $patharr[1];
                unset($patharr[1]); ////为获取参数去掉方法
            } else {
                $this->action = conf::get('ACTION','route'); //默认配置方法
            }
//            url多余部分转换成GET
//            p($patharr);
            $count = count($patharr) + 2;
            $i = 2;
            while ($i < $count) {
                if(isset($patharr[$i + 1])) { //str/2/3 数组越界，不处理
                    $_GET[$patharr[$i]] = $patharr[$i + 1];
                }
                $i = $i + 2;
            }
//            p($_GET);
        } else { //默认配置控制器和方法为index
            $this->ctrl = conf::get('CTRL','route');
            $this->action = conf::get('ACTION','route');
        }
    }
}