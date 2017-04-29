<?php

namespace Autoload;

class ClassLoader
{
    /**
     * 保存的 命名空间对应文件路径的映射, 有新的类的时候需要自己手动添加
     */
    private $classMap;

    /**
     * 保存的自动加载的全局文件
     */
    private $loadFiles;


    public function __construct($classMap = null)
    {
        /**
         * 获取到两个配置的内容, 功能比较简单,不能自动生成,需要手动在 autoload_static.php 和 autoload_files.php 添加
         */
        $this->classMap = require_once __DIR__ . '/autoload_static.php';
        $this->loadFiles = require_once __DIR__ . '/autoload_files.php';
    }

    /**
     * 注册
     * @Author:  BroQiang <broqiang@qq.com>
     * @DateTime 2017-04-29T22:26:26+0800
     * @param    boolean $prepend [description]
     * @return   [type] [description]
     */
    public function register($prepend = false)
    {
        spl_autoload_register([$this, 'loadClass'], true, $prepend);
    }

    /**
     * spl_autoload_register 的回调
     * @Author:  BroQiang <broqiang@qq.com>
     * @DateTime 2017-04-29T22:26:39+0800
     * @param    [type] $class [description]
     * @return   [type] [description]
     */
    public function loadClass($class)
    {
        if ($file = $this->findFile($class)) {
            $this->includeFile($file);
            return true;
        }
    }

    /**
     * 得到命名空间对应的文件路径
     * @Author:  BroQiang <broqiang@qq.com>
     * @DateTime 2017-04-29T22:26:55+0800
     * @param    [type] $file [description]
     * @return   [type] [description]
     */
    public function findFile($file)
    {
        if(array_key_exists($file,$this->classMap)) {
            return $this->classMap[$file];
        }
    }

    /**
     * 加载全局文件
     * @Author:  BroQiang <broqiang@qq.com>
     * @DateTime 2017-04-29T22:27:40+0800
     * @return   [type] [description]
     */
    public function requireFiles()
    {
        foreach ($this->loadFiles as $fileIdentifier => $file) {
            if(is_file($file) && empty($GLOBALS['autoload_files'][$fileIdentifier])) {
                $this->includeFile($file);
                $GLOBALS['autoload_files'][$fileIdentifier] = true;
            }
        }
    }

    /**
     * 引入文件
     * @Author:  BroQiang <broqiang@qq.com>
     * @DateTime 2017-04-29T22:27:50+0800
     * @param    [type] $file [description]
     * @return   [type] [description]
     */
    public function includeFile($file)
    {
        include $file;
    }


}
