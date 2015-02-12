<?php
/**
 * @name:配置文件
 * @author:caipj
 * @copyright:caipj
 * @package:config
 * @since:20140204
 */
return array(
				'application' 	=> array(	//应用程序配置
											'name' 				=> 'myapp',
											'lang' 				=> 'ch',
											'theme'				=> 'default',
											'debug' 			=> FALSE,
											'log' 				=> FALSE,
											'systemLib' 		=> array('core','db','log','templateEngine'),
											'defaultModule'		=> 'index',
											'theme'				=> 'default',
											'exceptionHandler'	=> array('JException','handler'),		//异常处理Handler
											'errorHandler'		=> array('JException','handlerError'),	//错误处理Handler
										),
				'modules'		=> array(	//模块配置
											'index' => array(	//index模块
																'defaultController' => 'index',
																'defaultAction'		=> 'index',
																),
											
										),
				'router'	 	=> array(	//路由配置
											'defaultRouter' 			=> array('/\/([^\/]+)\/([^\/]+)\/([^\/]+)(\/(.*))?$/i' => '__m=${1}&__c=${2}&__a=${3}&__p=${4}'),
											'customConfigFile' 				=> 'router.php',
											'urlSuffix'					=> '.html',
										),
				'params'		=> array(	//自定义参数
											'configFile' 		=>	'params.php',
										),
										
			
			);