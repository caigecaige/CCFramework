<?php
/**
 * @name:JRouter
 * @author:caipj
 * @copyright:caipj
 * @package:core
 * @since:20140204
 */
//namespace core;
final class JRouter
{
	private $__routerPartner;
	private $__urlSuffix;
	private $__m;
	private $__c;
	private $__a;
	static private $__instance;
	private function __construct()
	{
		$this->__routerPartner = JConfig::getInstance()->getModuleSet('router', 'defaultRouter');
		$this->__urlSuffix = JConfig::getInstance()->getModuleSet('router', 'urlSuffix');
	}
	
	/**
	 * 检查是否有自定义路由
	 */
	private function checkRouter($uri)
	{
		$uri = str_ireplace($this->__urlSuffix,'',$uri);
		foreach($this->__routerPartner as $rule => $replace)
		{
			$newUri = preg_replace($rule, $replace, $uri);
		}
		parse_str($newUri,$AC);
		/**
		 * 路由解析后把相应的module/controller/action保存供路由调用
		 */
		JApplication::getApp()->__request->__requestAC = $newUri;
		JApplication::getApp()->__request->__m = $AC['__m'];
		JApplication::getApp()->__request->__c = $AC['__c'];
		JApplication::getApp()->__request->__a = $AC['__a'];
		if(isset($AC['__p']))
		{
			$inputParams = explode('/',$AC['__p']);
			for($i = 0;$i < count($inputParams);$i++)
			{
				if(is_numeric($inputParams[$i]))
				{
					continue;
				}
				if($i < (count($inputParams) - 1))
				{
					JApplication::getApp()->__request->$inputParams[$i] = $inputParams[$i+1];
				}
				else
				{
					JApplication::getApp()->__request->$inputParams[$i] = NULL;
				}
				$i++;
			}
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
	
	/**
	 * 解析路由
	 * @todo:支持其他路由方式
	 */
	private function parseUri()
	{
		$uri = JApplication::getApp()->__request->request_uri;
		$this->checkRouter($uri);
		$m = JApplication::getApp()->__request->getParam('__m');
		$c = JApplication::getApp()->__request->getParam('__c');
		$a = JApplication::getApp()->__request->getParam('__a');
		/**
		 * 命名规则以及检查是否有默认module/controller/action
		 */
		if(empty($m))
		{
			$m = JConfig::getInstance()->getModuleSet('application', 'defaultModule');
		}
		$defaultCA = JConfig::getInstance()->getModuleSet('modules',$m);
		if(empty($c))
		{
			$c = $defaultCA['defaultController'];
		}
		$c = ucfirst($c) . 'Controller';
		if(empty($a))
		{
			$a = $defaultCA['defaultAction'];
		}
		$a = ucfirst($a) . 'action';
		$rt = array('m' => $m,'c' => $c,'a' => $a);
		return $rt;
	}
	
	public function dispatch()
	{
		$routerAttr = $this->parseUri();
		$this->checkRequestExist($routerAttr['m'],$routerAttr['c'],$routerAttr['a']);
		JApplication::getApp()->__module = $routerAttr['m'];
		JApplication::getApp()->__controller = $routerAttr['c'];
		JApplication::getApp()->__action = $routerAttr['a'];
	}
	
	private function checkRequestExist($module,$controller,$action)
	{
		$moduleDir = J_DIR_APP_ROOT . J_DIR_SEP . 'controllers' . J_DIR_SEP . $module;
		if(is_dir($moduleDir))
		{
			/**
			 * @see:加载该模块
			 */
			JAutoload::import('controllers.' . $module);
			$controllerFile = $moduleDir . J_DIR_SEP . ucfirst($controller) . '.php';
			if(is_file($controllerFile))
			{
				if(class_exists($controller))
				{
					if(method_exists($controller, $action))
					{
						return TRUE;
					}
					else
					{
						Throw new Exception('Action[' . $action . '] Not Found!',404);
					}
				}
				else 
				{
					Throw new Exception('Controller[' . $controller . '] Not Found!',404);
				}
			}
			else
			{
				Throw new Exception('Controller[' . $controller . '] Not Found!',404);
			}
		}
		else
		{
			Throw new Exception('Module[' . $module . '] Not Found!',404);
		}
	}
	
	
	
}