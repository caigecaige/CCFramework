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
		self::initLoader();
		self::initConfig();
	}
	
	static private function initLoader()
	{
		$loaderClass = J_DIR_FRAMEWORK_CORE . J_DIR_SEP . 'JAutoload.php';
		require_once($loaderClass);
		spl_autoload_register(array('JAutoload','loader'));
	}
	
	static private function initConfig()
	{
		
	}
	
	static private function initDb()
	{
		
	}
	
	
}