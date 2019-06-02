<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */

define('AGEGG',dirname(__FILE__));
define('CORE',AGEGG.'/core');
define('APP',AGEGG.'/app');
define('MODULE','app');
define('DEBUG',true);

include "vendor/autoload.php";

if(DEBUG) {
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
    ini_set('display_error','On');
} else {
    ini_set('display_error','Off');
}

include CORE.'/common/function.php';

include CORE.'/agegg.php';

spl_autoload_register('\core\agegg::load');

\core\agegg::run();