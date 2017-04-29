<?php

/**
 * 自动加载 实现
 */
class AutoLoadInit
{
    /**
     * 加载回调
     * @Author:  BroQiang <broqiang@qq.com>
     * @DateTime 2017-04-29T22:22:10+0800
     * @param    [type] $class [description]
     * @return   [type] [description]
     */
    public static function loadClassLoader($class)
    {
        if ($class === "Autoload\ClassLoader") {
            require __DIR__ . DIRECTORY_SEPARATOR . 'ClassLoader.php';
        }
    }

    /**
     * 执行加载
     * @Author:  BroQiang <broqiang@qq.com>
     * @DateTime 2017-04-29T22:22:25+0800
     * @return   [type] [description]
     */
    public static function getLoader()
    {
        // 回到loadClassLoader, 目的是为了加载 ClassLoader 类
        spl_autoload_register(["AutoLoadInit", "loadClassLoader"], true, true);
        
        // 初始化 ClassLoader
        $loader = new \Autoload\ClassLoader;

        // 注册自动加载
        $loader->register(true);

        $loader->requireFiles();

        return $loader;
    }

}
