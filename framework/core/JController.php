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
	protected $__render;
	
	public function init()
	{
		$this->__render = new TwigRender();
		//$this->__render = new DefaultRender();
	}
	
	public function runAction($action)
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
	
	public function render($template = '')
	{
		return $this->__render->render($template);
	}
	
	public function renderNoLayout($template = '')
	{
		return $this->__render->renderNoLayout($template);
	}
	
	public function setViewData($data = array())
	{
		return $this->__render->setData($data);
	}
}