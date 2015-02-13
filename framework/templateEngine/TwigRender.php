<?php
/**
 * @name:TwigRender,twig模板引擎
 * @author:caipj
 * @copyright:caipj
 * @package:templateEngine
 * @since:20140204
 */
//namespace core/viewrender;
class TwigRender extends JRender
{
	protected $__layoutDir = 'layouts';
	protected $__layoutFile = 'main.php';
	protected $__viewData;
	protected $__viewVarPrefix = 'j_';
	
	public function __construct()
	{
		require_once(J_DIR_FRAMEWORK_ROOT . J_DIR_SEP . 'templateEngine' . J_DIR_SEP . 'Twig' . J_DIR_SEP . 'Autoloader.php');
		Twig_Autoloader::register();
	}
	
	public function templateFile()
	{
		$templateFileName = strtolower(str_ireplace('Action','',JApplication::getApp()->__action) . $this->__fileSuffix);
		$theme = JApplication::getApp()->theme;
		$module = JApplication::getApp()->__module;
		$controller = strtolower(str_ireplace('Controller','',JApplication::getApp()->__controller));
		$templateFileDir = J_DIR_APP_ROOT.J_DIR_SEP.'views'.J_DIR_SEP.'themes'.J_DIR_SEP.$theme.J_DIR_SEP.$module.J_DIR_SEP.$controller.J_DIR_SEP;
		return $templateFileDir . $templateFileName;
	}
	
	public function layoutFile()
	{
		$theme = JApplication::getApp()->theme;
		$module = JApplication::getApp()->__module;
		$layoutFileDir = J_DIR_APP_ROOT.J_DIR_SEP.'views'.J_DIR_SEP.'themes'.J_DIR_SEP.$theme.J_DIR_SEP.$module.J_DIR_SEP.$this->__layoutDir.J_DIR_SEP;
		return $layoutFileDir . $this->__layoutFile;
	}
	
	public function render($template = '')
	{
		if(!empty($template))
		{
			$templateFile = dirname($this->templateFile()) . J_DIR_SEP . $template . $this->__fileSuffix;
		}
		else
		{
			$templateFile = $this->templateFile();
		}
		$layout = $this->layoutFile();
		if(!empty($layout) && is_file($layout))
		{
			$viewContent = $this->renderFile($templateFile, $this->__viewData, TRUE,FALSE);
			$this->setData(array($this->__varName => $viewContent));
			$this->renderFile($layout, $this->__viewData, FALSE);
		}
		else
		{
			$this->renderNoLayout();
		}
	}
	
	public function renderNoLayout($template = '')
	{
		if(!empty($template))
		{
			$templateFile = dirname($this->templateFile()) . J_DIR_SEP . $template . $this->__fileSuffix;
		}
		else
		{
			$templateFile = $this->templateFile();
		}
		$this->renderFile($templateFile, $this->__viewData, FALSE);
	}
	
	public function setData($data = array())
	{
		if(!empty($data) && count($data))
		{
			foreach($data as $varname => $varValue)
			{
				$this->__viewData[$varname] = $varValue;
			}
		}
	}
	
	public function renderFile($file,$data,$return,$escape = TRUE)
	{
		$loader = new Twig_Loader_Filesystem(dirname($file));
		$twig = new Twig_Environment($loader,array('debug' => TRUE,'cache' => TRUE,'autoescape' => $escape));
		if($return)
		{
			return $twig->render(basename($file), $data);
		}
		else
		{
			echo $twig->render(basename($file), $data);
		}
	}
}