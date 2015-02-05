<?php
/**
 * @name:JRequest
 * @author:caipj
 * @copyright:caipj
 * @package:core
 * @since:20140204
 */
//namespace core;
final class JRequest
{
	private $__requestData;
	static public $instance;
	
	private function __construct()
	{
		$this->init();
	}
	
	static public function getInstance()
	{
		if(self::$instance instanceof self)
		{
		}
		else
		{
			self::$instance = new JRequest();
		}
		return self::$instance;
	}
	
	private function init()
	{
		$this->__requestData = array_merge_recursive($_SERVER,$_REQUEST);
	}
	
	/**
	 * @return:String
	 */
	public function getParam($name,$default = '')
	{
		if(isset($this->__requestData[$name]))
		{
			return $this->filterStr($this->__requestData[$name]);
		}
		return $default;
	}
	
	public function getParams()
	{
		
	}
	
	/**
	 * @return:boolean
	 */
	public function isAjax()
	{
		
	}
	
	/**
	 * @return:get/post
	 */
	public function postMethod()
	{
		return $this->request_method;
	}
	
	/**
	 * @return:String
	 */
	public function __get($key)
	{
		var_dump($this->__requestData);
		$key = strtoupper($key);
		$val = isset($this->__requestData[$key]) ? $this->__requestData[$key] : '';
		if(!empty($val))
		{
			$val = $this->filterStr($val);
		} 
		return $val;
	}
	
	/**
	 * @name:filter data;
	 */
	private function filterStr($str)
	{
		return $str;
	}
	
	
}