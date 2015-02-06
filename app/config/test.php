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
											'name' 			=> 'appName',
											'lang' 			=> 'ch',
											'debug' 		=> FALSE,
											'log' 			=> FALSE,
											'systemLib' 	=> array('core','db','log'),
											'defaultModule'	=> 'index',
										),
				'modules'		=> array(	//模块配置
											'index' => array(
																'defaultController' => 'index',
																'defaultAction'		=> 'index',
																),
											
										),
				'router'	 	=> array(	//路由配置
											'defaultRouter' 			=> array('/module/controller/action' => 'm=<module>&c=<controller>&a=<action>'),
											'configFile' 				=> 'router.php',
											'urlSuffix'					=> '.html',
										),
				'params'		=> array(	//自定义参数
											'configFile' 		=>	'params.php',
										),
										
			
			);