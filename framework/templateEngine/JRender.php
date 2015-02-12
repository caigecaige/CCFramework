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
	protected $__varName = 'content';		//在布局引用视图内容的变量名称
	
	/**
	 * 返回模板文件路径
	 */
	abstract public function templateFile();
	
	/**
	 * 返回布局路径
	 */
	abstract public function layoutFile();
	
	/**
	 * 渲染模板文件
	 */
	abstract public function render();
	
	/**
	 *	渲染模板文件(无布局) 
	 */
	abstract public function renderNoLayout();
	
	/**
	 * 设置模板数据
	 */
	abstract public function setData($data = array());
}