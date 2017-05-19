<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 19.05.2017
 * Time: 12:39
 */

namespace SmartBlogger\Presenter;


class PresenterFactory
{
	public static function make($name){

		$class = sprintf("%s", $name);

		if(class_exists($class)){
			return new $class();
		}
	}
}