<?php



/**
 * 引入自动加载类, 命名模仿的 Composer, 功能比那个简单太多了, 兼容性和支持也少太多了 . . . . .
 */
require_once __DIR__ . DIRECTORY_SEPARATOR . 'autoload' . DIRECTORY_SEPARATOR . 'autoload_real.php';

/**
 * 调用自动加载
 */
return AutoLoadInit::getLoader();
