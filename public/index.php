<?php 
/**
 * 本示例的入口文件
 * 此项目的目的是为了实现 PHP 的自动加载, 只是用来学习
 * 实际代码中可以直接使用 composer 即可,既简单,又强大
 * 
 */

/**
 * 定义项目根目录
 */
define('ROOT_PATH', dirname(__DIR__));

/**
 * 是否开启 debug
 * 没有太多功能,如果开启 debug 会支持输出错误, 不开启将错误记录到日志
 */
define('DEBUG', true);



/**
 * 引入自动引入的文件, 执行完这个就会将需要加载的文件加载
 */
require ROOT_PATH . DIRECTORY_SEPARATOR . 'bootstrap' . DIRECTORY_SEPARATOR . 'autoload.php';

/**
 * 初始化的业务逻辑, 代码逻辑在此处开始
 */
require ROOT_PATH . DIRECTORY_SEPARATOR . 'bootstrap' . DIRECTORY_SEPARATOR . 'app.php';






