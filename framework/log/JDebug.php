<?php
/**
 * @name:JDebug
 * @author:caipj
 * @copyright:caipj
 * @package:core
 * @since:20140204
 */
//namespace core/log;
class JDebug extends JLogger
{
	static private $__instace;
	
	private function __construct()
	{
	}
	
	static public function getInstance()
	{
		if(self::$__instace instanceof self)
		{
			
		}
		else
		{
			self::$__instace = new self();
		}	
		return self::$__instace;
	}
	
	public function render()
	{
		
	}
	
	public function logFormat()
	{
		
	}
}
