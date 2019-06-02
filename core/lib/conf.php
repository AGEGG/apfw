<?php

namespace core\lib;

class conf
{
    static public $conf = array();

    /**
     * 获取单一配置
     * 1.判断配置文件是否存在
     * 2.判断配置是否存在
     * 3.缓存配置
     * $name:配置名  $file:文件名
     */
    static public function get($name,$file)
    {
        if (isset(self::$conf[$file])) { //存在直接返回
            return self::$conf[$file][$name];
        } else {
            $path = AGEGG.'/core/config/'.$file.'.php';
            if(is_file($path)) {
                $conf = include $path; //配置项的数组
                if(isset($conf[$name])) {
                    self::$conf[$file] = $conf; //缓存
                    return $conf[$name];//返回配置
                } else {
                    throw new \Exception('没有这个配置项'.$name);
                }
            } else {
                throw new \Exception('找不到配置文件'.$file);
            }
        }
    }

    /**
     * 获取整个配置
     * 与获取单一配置类似，只是不用找配置名，直接返回配置数组
     */
    static public function all($file)
    {
        if (isset(self::$conf[$file])) {
            return self::$conf[$file];
        } else {
            $path = AGEGG.'/core/config/'.$file.'.php';
            if(is_file($path)) {
                $conf = include $path;
                self::$conf[$file] = $conf;
                return $conf;
            } else {
                throw new \Exception('找不到配置文件'.$file);
            }
        }

    }

}