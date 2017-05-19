<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 19.05.2017
 * Time: 9:44
 */

namespace SmartBlogger\Storage;


class StorageFactory
{
	public static function make($name){
		$class = sprintf("Storage\\%s", $name);

		if(class_exists($class)){
			return $class::getInstance();
		}
	}
}