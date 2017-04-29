
# 编写一个基于 MVC 的框架

> 本项目定位是为了学习, 并不是最终使用版本, 并且非常基础
> 
> 真是项目推荐使用 Composer, 太强大了,太方便了
> 
> 为什么还要自己写呢 ? 学习, 不了解清楚了, 即使通过 Composer 可以使项目正常运行, 但是要是不明白 . . . . .
> 
> 把本代码搞明白了, 再去学习 Composer 会轻松很多





## 开始之前需要掌握的知识点

需要提前掌握的因为在本框架中会用到, 同时也是可以学习到的知识点

- PHP环境搭建 - 可以参考[我的博客](http://broqiang.com), 里面有安装配置文档

- [类与对象](http://php.net/manual/zh/language.oop5.php) , 
    重点是 [类的自动加载](http://php.net/manual/zh/language.oop5.autoload.php) 及 
    [SPL 函数(自动加载函数)](http://php.net/manual/zh/function.spl-autoload-register.php)




## 目录结构

此结构借鉴的 Laravel, 用过几个框架,觉得这种方式最优雅, 当然因为此框架没有那么完善,还是会有不一样的地方

-- app - 项目代码根目录

-- bootstrap - 引导文件保存目录
 
-- config - 配置文件目录, 此处没有使用

-- public - 对外展示的目录,包括 `index.php` 入口文件, css,js等静态内容

-- storage - 一些需要保存的东西,此处只有个日志目录

-- framework - 框架目录,此处也只有个助手函数用来测试


## 开始

在web服务器中, 将项目根目录配置到 '保存位置/auto-load-demo/public'

代码中 public 下的入口文件 index.php 开始,我在代码中进行了非常详细的注释


## 更新日志

- 2017-04-29 首次完成,非常的基础功能, 只是个学习代码,没有错误的情况下不会进行更新


