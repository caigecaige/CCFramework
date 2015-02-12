<?php
/**
 * @name:JApplication
 * @author:caipj
 * @copyright:caipj
 * @package:core
 * @since:20140204
 */
//namespace core;
require_once 'JBootstrap.php';
final class JApplication
{
	static private $__app;
	public $__module;
	public $__controller;
	public $__action;
	public $__request;
	public $__router;
	public $__logger;
	public $__runtimes;
	
	private function __construct()
	{
		/**
		 * 加载bootstrap
		 */
		$this->setupBootstrap();
		/**
		 * 加载request类
		 */
		$this->__request = JRequest::getInstance();
		/**
		 * 加载路由类
		 */
		$this->__router = JRouter::getInstance();
		/**
		 * 加载日志
		 */
		if(JConfig::getInstance()->getModuleSet('application', 'log'))
		{
			$this->__logger = JDebug::getInstance();
		}
	}
	
	static public function getApp()
	{
		if(!self::$__app instanceof JApplication)
		{
			self::$__app = new JApplication();
		}
		return self::$__app;
	}
	
	/**
	 * 加载自动加载器
	 */
	private function setupBootstrap()
	{
		JBootstrap::init();
	}
	
	public function run()
	{
		$controller = JApplication::getApp()->__controller;
		$action = JApplication::getApp()->__action;
		$dispath = new $controller();
		$dispath->runAction($action);
	}
	
	/**
	 * @name:程序执行入口
	 * @param:$config:app运行所属的配置文件
	 */
	public function start($config = '')
	{
		$this->beforeRun();
		$this->run();
		$this->afterRun();
	}
	
	private function beforeRun()
	{
		/**
		 * 记录运行时间
		 */
		//JDebug::getInstance()->record(__FILE__, __LINE__);
		$this->__router->dispatch();
	}
	
	private function afterRun()
	{
		//清空加载import的类库
		//JDebug::getInstance()->record(__FILE__, __LINE__);
	}

	public function __get($key)
	{
		return JConfig::getInstance()->getModuleSet('application', $key);
	}
	
}