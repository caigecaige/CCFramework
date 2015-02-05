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
	private $__systemLibPath;	//系统级的自动加载路径
	private $__userLibPath;	//使用import加载的类路径
	private function __construct()
	{
	}
	
	static final function loader($class)
	{
		$jconfig = new JConfig();
		$this->__systemLibPath = $jconfig->getModuleSet('application','systemLib');
		foreach($this->__systemLibPath as $path)
		{
			$classFile = J_DIR_FRAMEWORK_ROOT . J_DIR_SEP . $path . J_DIR_SEP . $class . '.php';
			if(is_file($classFile))
			{
				require_once($class);
				break;
			}
		}
	}
	
	static final function import()
	{
		
	}
}