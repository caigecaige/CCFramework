<?php

class IndexController extends JController
{
	public function init()
	{
		parent::init();
	}
	
	public function indexAction()
	{
		$data = array('username' => 'hello');
		$this->setViewData($data);
		$this->renderNoLayout('index2');
	}
	
	public function infoAction()
	{
		echo 'hello world';
	}
}