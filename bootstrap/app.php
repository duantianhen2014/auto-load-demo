<?php

// 引入 HelloWorld 命名空间, 两个文件, 用两种方式 new , 为了验证两种方式都可以自动加载
use App\Hello\HelloWorld;

/**
 * 设置 错误显示 方式
 */
setReporting();


/**
 * 下面是初始化两个用来测试结果的类
 */

$test = new \App\Test();

$test->index();

$hello = new HelloWorld();

$hello->index();
