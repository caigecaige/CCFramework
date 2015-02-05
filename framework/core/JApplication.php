<?php
/**
 * @name:JAutoload
 * @author:caipj
 * @copyright:caipj
 * @package:core
 * @since:20140204
 */
//namespace core;
final class JApplication
{
	public $__module;
	public $__controller;
	public $__action;
	public $__request;
	public $__config;
	public $__logger;
	
	public function __construct()
	{
		/**
		 * 加载request类
		 */
		$this->__request = JRequest::getInstance();
		/**
		 * 加载配置类
		 */	
		$this->__config = JConfig::getInstance();
		
		$this->__logger = new JDebug();
		
	}
	
	/**
	 * @name:run,程序入口
	 * @param:$params:app运行的参数,$config:app运行所属的配置
	 */
	public function run($paramsStr = '',$config = '')
	{
		echo 'app running...';
	}
	
	/**
	 * @name start
	 */
	public function start($config = '')
	{
		$this->beforeRun();
		$this->run();
		$this->afterRun();
	}
	
	private function beforeRun()
	{
		$this->parseUri();		
	}
	
	private function afterRun()
	{
	}
	
	private function parseParams($requestStr)
	{
		parse_str($requestStr,$params);
		return $params;
	}

	private function parseUri()
	{
		$uri = $this->__request->request_uri;
		$params = explode('/',$uri);
		$params = array_filter($params,function($v){
			if(empty($v)){return false;}else{return true;}
		});
		foreach($params as $param)
		{
			
		}
		
	}
	
	
}