<?php

namespace BootStrap;

class ClassLoader
{
    /**
     * PSR-4 标准的的数组, 模仿 Composer 的 autoload 中的 psr-4 中的配置格式
     */
    protected $prefixDirsPsr4 = [];

    public function init()
    {
        // 取得 psr4 标准的命名空间及路径的对应关系
        $map = require __DIR__ . '/autoload_psr4.php';

        // 循环， 并赋值
        foreach ($map as $namespace => $path) {
            $this->setPsr4($namespace, $path);
        }

        // 通过 spl_autoload_register 注册类自动加载
        $this->register();

        // 自动加载全局 PHP 文件
        $this->includeFiles();
    }

    /**
     * 注册，调用 spl_autoload_register
     * @Author:  BroQiang <broqiang@qq.com>
     * @DateTime 2017-05-02T18:39:09+0800
     * @param    boolean $prepend [description]
     * @return   [type] [description]
     */
    public function register($prepend = false)
    {
        spl_autoload_register(array($this, 'loadClass'), true, $prepend);
    }

    /**
     * [setPsr4 prefixDirsPsr4 数组赋值]
     * @param [type] $prefix [description]
     * @param [type] $paths [description]
     */
    public function setPsr4($prefix, $paths)
    {
        if (!$prefix || !$paths) {
            throw new \InvalidArgumentException("无效的 PSR-4 参数");
        }

        if ($prefix[strlen($prefix) - 1] !== '\\') {
            throw new \InvalidArgumentException("PSR-4 前缀必须以命名空间分隔符结尾");
        }

        $this->prefixDirsPsr4[$prefix] = $paths;
    }

    /**
     * 加载 PHP 全局文件（函数）
     */
    public function includeFiles()
    {
        // 获取需要加载的全局配置文件
        $includeFiles = require __DIR__ . '/autoload_files.php';

        // 循环，并引用文件
        foreach ($includeFiles as $fileIdentifier => $file) {
            $this->requireFiles($fileIdentifier, $file);
        }
    }

    /**
     * spl_autoload_register 的回调
     *
     * @param  [type] $class [description]
     * @return [type] [description]
     */
    public function loadClass($class)
    {
        // 如果文件找到了就加载
        if ($file = $this->findFile($class)) {
            $this->includeFile($file);
            return true;
        }
    }

    /**
     * 查找类对应的文件
     *
     * @param  [type] $class [description]
     * @return [type] [description]
     */
    protected function findFile($class)
    {
        foreach ($this->prefixDirsPsr4 as $namespace => $path) {
            $len = strlen($namespace);
            // 对比字符串是否相等
            if (strncmp($class, $namespace, $len) === 0) {
                // 组合文件路径
                $file = $path . str_replace('\\', '/', substr($class, $len)) . '.php';
                if (! file_exists($file)) {
                    throw new \Exception($file . '不存在');
                }

                return $file;
            }
        }
    }

    /**
     * 包含文件
     * @param  [type] $file [description]
     * @return [type] [description]
     */
    protected function includeFile($file)
    {
        include $file;
    }

    /**
     * 加载全局文件
     * @param  [type] $fileIdentifier [description]
     * @param  [type] $file [description]
     * @return [type] [description]
     */
    protected function requireFiles($fileIdentifier, $file)
    {
        if (empty($_GLOBALS[$fileIdentifier]) && file_exists($file)) {
            $this->includeFile($file);
            $_GLOBALS[$fileIdentifier] = true;
        }
    }

}
