<?php

class IndexController extends JController
{
	public function init()
	{
		parent::init();
	}
	
	public function indexAction()
	{
		echo 'hello index';
	}
	
	public function infoAction()
	{
		echo 'hello world';
	}
}