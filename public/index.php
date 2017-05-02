<?php 

/**
 * 设置显示错误信息，为了方便调试
 */
ini_set('display_errors', 1);

/**
 * 处理类及文件自动加载
 */
require_once __DIR__ . '/../bootstrap/autoload.php';


/**
 * New 一下下面几个目录中的类, 里面没有什么，只有个构造方法打印信息, 打印出来证明已经加载上了
 */
new \BroQiang\Application;

new \BroQiang\Core\App;

new \App\Controllers\Controller;

// 这个测试通过 use 方式引入类
use App\Models\Model;
new Model;
