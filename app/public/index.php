<?php

/**
 * 定义app根目录
 */
define('J_DIR_APP_ROOT', dirname(dirname(__FILE__)));
/**
 * 定义环境,读取config目录下的相应配置文件,默认为test
 */
define('J_ENV','test');
/**
 * 加载Application类，执行Application
 */
require_once('../../framework/core/JApplication.php');
/**
 * 配置文件名，位于config,不需要后缀
 */
JApplication::getApp()->start();

echo JApplication::getApp()->__runtime;