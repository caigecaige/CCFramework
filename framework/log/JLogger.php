<?php
/**
 * @name:JLogger
 * @author:caipj
 * @copyright:caipj
 * @package:log
 * @since:20140204
 */
//namespace core/log;
abstract class JLogger
{
	abstract public function render();
	abstract public function logFormat();
	
}