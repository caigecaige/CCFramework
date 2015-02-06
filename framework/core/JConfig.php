<?php 
/**
 * @name:JConfig
 * @author:caipj
 * @copyright:caipj
 * @package:core
 * @since:20140204
 */
//namespace core;
final class JConfig
{
	static private $__instance;
	private $configData;
	
	private function __construct()
	{
		$configFile = J_DIR_APP_ROOT . J_DIR_SEP . 'config' . J_DIR_SEP . 'test.php';
		if(is_file($configFile))
		{
			$this->configData = include_once($configFile);
		}
	}
	
	
	static public function getInstance()
	{
		if(self::$__instance instanceof self)
		{
			
		}
		else
		{
			self::$__instance = new self();
		}
		return self::$__instance;
	}
	
	
	public function get($key)
	{
		if(isset($this->configData[$key]))
		{
			return $this->configData[$key];
		}
		return NULL;
	}
	
	public function getModuleSet($module,$key)
	{
		if(isset($this->configData[$module][$key]))
		{
			return $this->configData[$module][$key];
		}
		return NULL;
	}
	
	public function set()
	{
		
	}
	
	public function __get($key)
	{
		return NULL;
	}
}