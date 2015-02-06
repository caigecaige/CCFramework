<?php

/**
 * 定义app根目录
 */
define('J_DIR_APP_ROOT', dirname(dirname(__FILE__)));

/**
 * 加载Application类，执行Application
 */
require_once('../../framework/core/JApplication.php');
JApplication::getApp()->start();




