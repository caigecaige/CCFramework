<?php
/**
 * @name:JException
 * @author:caipj
 * @copyright:caipj
 * @package:core
 * @since:20140204
 */
//namespace core;
class JException extends Exception
{
	const J_EXCEPTION_MODULE_ERROR_MSG = '模块错误';
	const J_EXCEPTION_MODULE_ERROR_CODE = 404;	//模块错误
	
	const J_EXCEPTION_CONTROLLER_ERROR_MSG = '控制器错误';	
	const J_EXCEPTION_CONTROLLER_ERROR_CODE = 404;	//控制器错误
	
	const J_EXCEPTION_ACTION_ERROR_MSG = '动作错误';
	const J_EXCEPTION_ACTION_ERROR_CODE = 404;	//动作错误
	
	const J_EXCEPTION_URL_ERROR_MSG = 'URL错误';
	const J_EXCEPTION_URL_ERROR_CODE = 404;	//控制器错误
	
	const J_EXCEPTION_WRONG_SUFFIX_MSG = '错误的URL后缀';
	const J_EXCEPTION_WRONG_SUFFIX_CODE = 404;	//后缀错误
	
	static public function handler()
	{
		echo 'catch exception!';
	}
	
	static public function handlerError()
	{
		echo 'catch error';
	}
}