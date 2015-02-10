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
	
	const J_EXCEPTION_CONFIG_FAIL_MSG = '找不到配置文件或者不可读';
	const J_EXCEPTION_CONFIG_FAIL_CODE = 404;	//后缀错误 
	
	static public function handler($exception)
	{
		echo '<style>.error{color: #CD403D;border-color: #eed3d7;padding: 8px 35px 8px 14px;margin-bottom: 18px;text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);background-color: #fcf8e3;border: 1px solid #D2C3A6;border-radius: 4px;display: block;line-height: 18px;}</style>';
		echo '<h1>'.get_class($exception)."</h1>\n";
		echo '<div class="error">'.$exception->getMessage().' ('.$exception->getFile().':'.$exception->getLine().')</div>';
		echo '<pre>';
		echo '<div class="error">'.$exception->getTraceAsString().'</div>';
		echo '</pre>';
	}
	
	static public function handlerError($errNo, $errStr, $errFile, $errLine)
	{
		echo 'catch error';
	}
}