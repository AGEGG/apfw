<?php
/**
 * Created by PhpStorm.
 * User: AGEGG-WORK
 * Date: 2018/12/14
 * Time: 9:39
 */
function p($var)
{
    if (is_bool($var)) {
        var_dump($var);
    } else if(is_null($var)) {
        var_dump(NULL);
    } else {
        echo "<pre style='position:relative;z-index:1000;padding:10px;
        border-radius:5px;background:#F5F5F5;border:1px solid #aaa;font-size:14px;
        line_height:18px;opacity:0.9'>" . print_r($var, true) ."</pre>";
    }
}