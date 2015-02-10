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
	private $__routerPartner = array();
	private $__urlSuffix;
	private $__m;
	private $__c;
	private $__a;
	static private $__instance;
	private function __construct()
	{
	}
	
	/**
	 * 获取url后缀并验证是否合法
	 */
	private function getUrlSuffix()
	{
		$this->__urlSuffix = JConfig::getInstance()->getModuleSet('router', 'urlSuffix');
		$requestUri = JApplication::getApp()->__request->request_uri;
		if(empty($requestUri) || $requestUri == '/')
		{
			$m = JConfig::getInstance()->getModuleSet('application', 'defaultModule');
			$defaultCA = JConfig::getInstance()->getModuleSet('modules',$m);
			JApplication::getApp()->__request->__uri = '/' . $m . '/' . $defaultCA['defaultController'] . '/' . $defaultCA['defaultAction'];
		}
		else
		{
			preg_match('/\.\w+$/i', $requestUri,$match);
			if(isset($match[0]) && !empty($match[0]))
			{
				$requestSuffix = $match[0];
				if($requestSuffix != $this->__urlSuffix)
				{
					Throw New Exception(JException::J_EXCEPTION_WRONG_SUFFIX_MSG,JException::J_EXCEPTION_WRONG_SUFFIX_CODE);
				}
				else
				{
					JApplication::getApp()->__request->__uri = str_ireplace('.html','',$requestUri);
				}
			}
			else
			{
				JApplication::getApp()->__request->__uri = str_ireplace('.html','',$requestUri);
			}
		}
	}
	
	/**
	 * 获取路由rule
	 */
	private function getRouterRule()
	{
		array_push($this->__routerPartner,JConfig::getInstance()->getModuleSet('router', 'defaultRouter'));
		/**
		 * 检查是否有自定义路由
		 */
		$customRuleConfig = JConfig::getInstance()->getModuleSet('router', 'customConfigFile');
		$customRuleConfigFile = J_DIR_APP_ROOT . J_DIR_SEP . 'config' . J_DIR_SEP . $customRuleConfig;
		if(is_file($customRuleConfigFile))
		{
			$ruleConfig = include_once($customRuleConfigFile);
			foreach($ruleConfig as $customRule)
			{
				array_push($this->__routerPartner,$customRule);
			}	
		}
	}
	
	/**
	 * 检查是否有自定义路由
	 */
	private function checkRouter($uri)
	{
		foreach($this->__routerPartner as $rule)
		{
			foreach($rule as $ruleName => $ruleExp)
			{	
				$newUri = preg_replace($ruleName, $ruleExp, $uri);
			}
		}
		parse_str($newUri,$AC);
		/**
		 * 路由解析后把相应的module/controller/action保存供路由调用
		 */
		if(!empty($AC) && count($AC))
		{
			JApplication::getApp()->__request->__requestAC = $newUri;
			JApplication::getApp()->__request->__m = $AC['__m'];
			JApplication::getApp()->__request->__c = $AC['__c'];
			JApplication::getApp()->__request->__a = $AC['__a'];
		}
		if(isset($AC['__p']) && !empty($AC['__p']))
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
			self::$__instance = new JRouter();
		}
		return self::$__instance;
	}
	
	/**
	 * 解析路由
	 * @todo:支持其他路由方式
	 */
	private function parseUri()
	{
		$this->getUrlSuffix();
		$this->getRouterRule();
		$uri = JApplication::getApp()->__request->__uri;
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
		$a = ucfirst($a) . 'Action';
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
						Throw new Exception(JException::J_EXCEPTION_ACTION_ERROR_MSG,JException::J_EXCEPTION_ACTION_ERROR_CODE);
					}
				}
				else 
				{
					Throw new Exception(JException::J_EXCEPTION_CONTROLLER_ERROR_MSG,JException::J_EXCEPTION_CONTROLLER_ERROR_CODE);
				}
			}
			else
			{
				Throw new Exception(JException::J_EXCEPTION_CONTROLLER_ERROR_MSG,JException::J_EXCEPTION_CONTROLLER_ERROR_CODE);
			}
		}
		else
		{
			Throw new Exception(JException::J_EXCEPTION_MODULE_ERROR_MSG,JException::J_EXCEPTION_MODULE_ERROR_CODE);
		}
	}
	
	
	
}