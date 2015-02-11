<?php
/**
 * @name:DefaultRender,默认的模板引擎
 * @author:caipj
 * @copyright:caipj
 * @package:templateEngine
 * @since:20140204
 */
//namespace core/viewrender;
class DefaultRender extends JRender
{
	
	public function templateFile()
	{
		$templateFileName = strtolower(str_ireplace('Action','',JApplication::getApp()->__action) . $this->__fileSuffix);
		$module = JApplication::getApp()->__module;
		$controller = strtolower(str_ireplace('Controller','',JApplication::getApp()->__controller));
		$templateFileDir = J_DIR_APP_ROOT . J_DIR_SEP . 'views'.J_DIR_SEP.'themes' . J_DIR_SEP . 'default' . J_DIR_SEP . $module . J_DIR_SEP . $controller . J_DIR_SEP;
		return $templateFileDir . $templateFileName;
	}
	
	public function render()
	{
		include_once($this->templateFile());
	}
}