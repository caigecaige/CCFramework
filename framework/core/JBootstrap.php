<?php
/**
 * @name:JAutoload
 * @author:caipj
 * @copyright:caipj
 * @package:core
 * @since:20140204
 */
//namespace core;
final class JBootstrap
{
	private function __construct(){}
	
	/**
	 * @see:初始化
	 */
	static public function init()
	{
		self::initConstance();
		self::initLoader();
		//self::initConfig();
		self::registerHandler();
	}
	
	/**
	 * 初始化全局变量
	 */
	static private function initConstance()
	{
		defined('J_DIR_SEP') ?  : define('J_DIR_SEP',DIRECTORY_SEPARATOR);
		defined('J_DIR_FRAMEWORK_ROOT') ? : define('J_DIR_FRAMEWORK_ROOT', dirname(J_DIR_APP_ROOT) . J_DIR_SEP . 'framework');
		defined('J_DIR_FRAMEWORK_CORE') ? : define('J_DIR_FRAMEWORK_CORE', J_DIR_FRAMEWORK_ROOT . J_DIR_SEP . 'core');
		defined('J_ENV') ? : define('J_ENV','test'); 
	}
	
	/**
	 * 初始化自动加载
	 */
	static private function initLoader()
	{
		$loaderClass = J_DIR_FRAMEWORK_CORE . J_DIR_SEP . 'JAutoload.php';
		require_once($loaderClass);
		spl_autoload_register(array('JAutoload','loader'));
	}
	
	/**
	 * 初始化配置文件
	 */
	static private function initConfig()
	{
		
	}
	
	/**
	 * 初始化数据库连接
	 */
	static private function initDb()
	{
		
	}
	
	/**
	 * 注册异常/错误处理 handler
	 */
	static private function registerHandler()
	{
		$exceptionHandler = JConfig::getInstance()->getModuleSet('application', 'exceptionHandler');
		$errorHandler = JConfig::getInstance()->getModuleSet('application', 'errorHandler');
		set_exception_handler($exceptionHandler);
		set_error_handler($errorHandler);
	}
	
	
}