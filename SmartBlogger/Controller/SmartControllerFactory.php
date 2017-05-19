<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 19.05.2017
 * Time: 15:02
 */

namespace SmartBlogger\Controller;


class SmartControllerFactory
{
	public static function make($name){
		$class = sprintf("SmartBlogger\\Controller\\%s", $name);

		if(class_exists($class)){
			return new $class();
		}
	}
}