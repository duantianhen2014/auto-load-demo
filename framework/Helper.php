<?php

/**
 * 用来测试的函数, 方便打印看起来方便的
 * @Author:  BroQiang <broqiang@qq.com>
 * @DateTime 2017-04-25T02:58:01+0800
 * @param    [var] $val [var_dump 可以接受的参数]
 * @param    string|null $title [标题]
 */
function p($val = null, string $title = null)
{
    if ($title) {
        echo "<br>{$title}<hr>";
    }
    echo "<pre>";
    var_dump($val);
    echo "</pre><br>";
}

function setReporting()
{
    if (DEBUG) {
        error_reporting(E_ALL);
        ini_set('display_errors', 'On');
    } else {
        error_reporting(E_ALL);
        ini_set('display_errors', 'Off');
        ini_set('log_errors', 'On');
        ini_set('error_log', ROOT_PATH . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR . 'errors.log');
    }
}
