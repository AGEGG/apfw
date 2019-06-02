<?php

namespace core;

use Grpc\Server;

class agegg
{
    public static $classMap = array();
    public $assign;
    static public function run()
    {
        \core\lib\log::init();
        $route = new \core\lib\route(); //调用路由类
        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlfile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
        $cltrClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
        if(is_file($ctrlfile)) {
            include $ctrlfile;
            $ctrl = new $cltrClass();
            $ctrl->$action();
            \core\lib\log::log('ctrl:'.$ctrlClass.'    '.'action:'.$action);
        } else {
            throw new \Exception('找不到控制器'.$ctrlClass);
        }
    }

    /**
     * 自动加载类库
     * 在index里spl_autoload_register加载
     * new \core\route();
     * $class = '\core\route';
     * AGEGG.'/core/route.php';
     */
    static public function load($class)
    {
        if(isset($classMap[$class])) { //已加载不再加载
            return true;
        } else {
            $class = str_replace('\\','/',$class);
            $file = AGEGG.'/'.$class.'.php';
            if(is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }


    /**
     * 分配数据
     */
    public function assign($name,$value)
    {
        $this->assign[$name] = $value;
    }

    /**
     * 展示
     */
    public function display($file)
    {
        $file = APP.'/views/'.$file;
        if(is_file($file)) {
//            extract($this->assign); //数组键名为变量名，且此变量=数组值
//            include $file;
            \Twig_Autoloader::register();
            $loader = new \Twig_Loader_Filesystem(APP.'/views');
            $twig = new \Twig_Environment($loader, array(
                'cache' => AGEGG.'/log/twig',
                'debug' => DEBUG,
            ));
            $template = $twig->loadTemplate('index.html');
            $template->display($this->assign?$this->assign:array());

        }



    }

}