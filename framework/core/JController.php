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
		$this->__render = new DefaultRender();
	}
	
	public function runAction($action)
	{
		$this->init();
		$this->beforeAction();
		$this->$action();
		$this->afterAction();
		$this->render($action);
	}
	
	public function beforeAction()
	{
		
	}
	
	public function afterAction()
	{
		
	}
	
	public function render($action)
	{
		$this->__render->render();
	}
	
	
}