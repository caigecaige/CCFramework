<?php 
/**
 * @name:JController
 * @author:caipj
 * @copyright:caipj
 * @package:core
 * @since:20140204
 */
//namespace core;
abstract class JController
{
	private $__render;
	
	public function init()
	{
		
	}
	
	public function runAction($action = '')
	{
		$this->init();
		$this->beforeAction();
		$this->$action();
		$this->afterAction();
	}
	
	public function beforeAction()
	{
		
	}
	
	public function afterAction()
	{
		
	}
	
	
}