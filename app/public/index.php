<?php

defined('J_DIR_SEP') ?  : define('J_DIR_SEP',DIRECTORY_SEPARATOR);
defined('J_DIR_APP_ROOT') ?  : define('J_DIR_APP_ROOT', dirname(dirname(__FILE__))); 
defined('J_DIR_FRAMEWORK_ROOT') ? : define('J_DIR_FRAMEWORK_ROOT', dirname(J_DIR_APP_ROOT) . J_DIR_SEP . 'framework');
defined('J_DIR_FRAMEWORK_CORE') ? : define('J_DIR_FRAMEWORK_CORE', J_DIR_FRAMEWORK_ROOT . J_DIR_SEP . 'core');

$loaderClass = J_DIR_FRAMEWORK_CORE . J_DIR_SEP . 'JBootstrap.php';
require_once($loaderClass);
JBootstrap::init();

$app = new JApplication();
$app->start('m=default&c=user&a=login');





