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
	static private $__instance;
	private $__runtimes;
	
	private function __construct()
	{
	}
	
	static public function getInstance()
	{
		if(!self::$__instance instanceof self)
		{
			self::$__instance = new JDebug();
		}
		return self::$__instance;
	}
	
	public function record($file,$line)
	{
		$record['file'] = $file;
		$record['line'] = $line;
		$record['currentTime'] = microtime(TRUE);
		$this->__runtimes[] = $record;
	}
	
	public function render()
	{
		var_dump($this->__runtimes);
	}
	
	public function logFormat()
	{
		
	}
}
