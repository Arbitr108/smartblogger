<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 19.05.2017
 * Time: 13:23
 */

namespace SmartBlogger\Application;

use SmartBlogger\Exception\RouteNotFoundException;

class Router
{
	private static $routes;

	public static function handle(Request $request){

		foreach(self::$routes as $regexp => $action){
			if(preg_match($regexp, strtolower(rtrim($request::uri(), "/"))))
				return $action;
		}
		throw new RouteNotFoundException();
	}

	public static function registerRoutes($routes)
	{
		self::$routes = $routes;
	}
}