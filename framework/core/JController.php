<?php 
/**
 * @name:JAutoload
 * @author:caipj
 * @copyright:caipj
 * @package:core
 * @since:20140204
 */
//namespace core;
abstract class JController
{
	
	abstract public function init();
	
	public function runAction($action = '')
	{
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