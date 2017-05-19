<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 19.05.2017
 * Time: 12:52
 */

namespace SmartBlogger\Application;


class Session
{
	public function start(){
		session_start();
	}

	public static function set($key, $value){
		$_SESSION[$key] = $value;
	}

	public static function get($key){
		if(!empty($_SESSION[$key]))
			return $_SESSION[$key];
		else
			return false;
	}

	public static function clear($key){
		if(isset($_SESSION[$key]))
			unset($_SESSION[$key]);

		return true;
	}
}