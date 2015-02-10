<?php 
/**
 * @name:JConfig
 * @author:caipj
 * @copyright:caipj
 * @package:core
 * @since:20140204
 */
//namespace core;
require_once 'JException.php';
final class JConfig
{
	static private $__instance;
	private $configData;
	
	private function __construct()
	{
		$configName = J_ENV . '.php';
		$configFile = J_DIR_APP_ROOT . J_DIR_SEP . 'config' . J_DIR_SEP . $configName;
		$this->checkConfigFileExist($configFile);
		if(is_file($configFile))
		{
			$this->configData = include_once($configFile);
		}
	}
	
	private function checkConfigFileExist($configFile)
	{
		if(!is_file($configFile))
		{
			Throw New Exception(JException::J_EXCEPTION_CONFIG_FAIL_MSG,JException::J_EXCEPTION_CONFIG_FAIL_CODE);
		}
	}
	
	
	static public function getInstance()
	{
		if(self::$__instance instanceof self)
		{
			
		}
		else
		{
			self::$__instance = new JConfig();
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