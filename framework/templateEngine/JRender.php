<?php 
/**
 * @name:Jrender,模板引擎父类
 * @author:caipj
 * @copyright:caipj
 * @package:core
 * @since:20140204
 */
//namespace core;
abstract class JRender
{
	protected $__fileSuffix = '.php';		//模板文件后缀
	
	/**
	 * 返回模板文件路径
	 */
	abstract public function templateFile();
	/**
	 * 渲染模板文件
	 */
	abstract public function render();
}