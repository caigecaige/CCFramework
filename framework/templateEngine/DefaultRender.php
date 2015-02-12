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
	protected $__layoutDir = 'layouts';
	protected $__layoutFile = 'main.php';
	protected $__viewData;
	protected $__viewVarPrefix = 'j_';
	
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
	
	public function render()
	{
		$layout = $this->layoutFile();
		if(!empty($layout) && is_file($layout))
		{
			$viewContent = $this->renderFile($this->templateFile(), $this->__viewData, TRUE);
			$this->setData(array($this->__varName => $viewContent));
			$this->renderFile($layout, $this->__viewData, FALSE); 
		}
		else
		{
			$this->renderNoLayout();
		}
		
	}
	
	public function renderNoLayout()
	{
		$this->renderFile($this->templateFile(), $this->__viewData, FALSE);
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
	
	public function renderFile($file,$data,$return)
	{
		if(is_array($data))
		{
			extract($data,EXTR_OVERWRITE);
		}
		if($return)
		{
			ob_start();
			require($file);
			ob_implicit_flush(FALSE);
			return ob_get_clean();
		}
		else
		{
			require($file);
		}
	}
}