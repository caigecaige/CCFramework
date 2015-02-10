<?php
/**
 * @name:JAutoload
 * @author:caipj
 * @copyright:caipj
 * @package:core
 * @since:20140204
 */
//namespace core;
require_once 'JConfig.php';
final class JAutoload
{
	static private $__systemLibPath;	//系统级的自动加载路径
	static private $__userLibPath;	//使用import加载的类路径
	private function __construct()
	{
	}
	
	static final function loader($class)
	{
		if(!empty(self::$__userLibPath) && count(self::$__userLibPath))
		{
			foreach(self::$__userLibPath as $uPath)
			{
				$classFile =  $uPath . J_DIR_SEP . $class . '.php';
				if(is_file($classFile))
				{
					require_once($classFile);
					return TRUE;
				}
			}
		}
		self::$__systemLibPath = JConfig::getInstance()->getModuleSet('application', 'systemLib');
		if(!empty(self::$__systemLibPath))
		{
			foreach(self::$__systemLibPath as $path)
			{
				$classFile = J_DIR_FRAMEWORK_ROOT . J_DIR_SEP . $path . J_DIR_SEP . $class . '.php';
				if(is_file($classFile))
				{
					require_once($classFile);
					return TRUE;
				}
			}
		}
	}
	
	/**
	 * @name:import,手动加载类目录,app根目录为根目录,分隔符使用 '.'
	 * 
	 */
	static final function import($libPath)
	{
		$libPath = str_ireplace('.',J_DIR_SEP,$libPath);
		$libPath = J_DIR_APP_ROOT . J_DIR_SEP . $libPath;
		$pathKey = md5($libPath);
		if(!isset(self::$__userLibPath[$pathKey]))
		{
			self::$__userLibPath[$pathKey] = $libPath;
		}
	}
}