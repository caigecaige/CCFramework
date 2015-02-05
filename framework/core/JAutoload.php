<?php
/**
 * @name:JAutoload
 * @author:caipj
 * @copyright:caipj
 * @package:core
 * @since:20140204
 */
//namespace core;
final class JAutoload
{
	static private $classSystemLibPath;	//系统级的自动加载路径
	static private $classUserLibPath;	//使用import加载的类路径
	private function __construct()
	{
		
	}
	
	static final function loader($class)
	{
		$class = J_DIR_FRAMEWORK_ROOT . J_DIR_SEP . 'core' . J_DIR_SEP . $class . '.php';
		require_once($class);
	}
	
	static final function import()
	{
		
	}
}