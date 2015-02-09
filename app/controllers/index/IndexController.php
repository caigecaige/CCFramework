<?php

class IndexController extends JController
{
	public function init()
	{
		parent::init();
	}
	
	public function indexAction()
	{
		//$uri = JApplication::getApp()->__request->request_uri;
		//$par = '/\/([^\/]+)\/([^\/]+)\/([^\/]+)\/(.*$)/i';
		//$res = preg_replace($par,'__m=${1}&__c=${2}&__a=${3}$__p=${4}',$uri);
		//echo $res;
		$id = JApplication::getApp()->__request->getParams('id');
		var_dump($id);
	}
	
	public function infoAction()
	{
		echo 'hello world';
	}
}