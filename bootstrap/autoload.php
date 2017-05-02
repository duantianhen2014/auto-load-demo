<?php

use App\Models\Model;

/**
 * 包含并初始化 ClassLoader
 */
require __DIR__ . '/ClassLoader.php';
$loader = new \Bootstrap\ClassLoader;

/**
 * 开始自动加载
 */
$loader->init();


