<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 19.05.2017
 * Time: 12:13
 */

namespace SmartBlogger\Application;


class Request
{
	private static $_server;
	private static $_query;
	private static $_post;

	public static function hydrate(){
		self::setServer($_SERVER);
		self::setQuery($_SERVER['QUERY_STRING']);
		self::setPost($_POST);
		return new static();
	}

	public static function get($key, $default = null)
	{
		if(!empty($_REQUEST[$key]))
			return $_REQUEST[$key];
		else
			return $default;
	}

	public static function server($key, $default = null){
		if(!empty(self::$_server[$key]))
			return self::$_server[$key];
		else
			return $default;
	}

	public static function query(){
		if(!empty(self::$_query))
			return self::$_query;
		else
			return null;
	}

	public static function uri(){
		return trim(self::$_server['REQUEST_URI']);
	}

	public static function all(){
		return $_REQUEST;
	}

	public static function method(){
		return $_SERVER['REQUEST_METHOD'];
	}

	public static function isPost(){
		return $_SERVER['REQUEST_METHOD'] == "POST";
	}

	public static function postParam($key, $default = null){
		return isset(self::$_post[$key]) ? self::$_post[$key] : $default;
	}

	public static function setPost($post){
		self::$_post = $post;
	}


	public static function setServer($server){
		self::$_server = $server;
	}

	public static function setQuery($query){
		self::$_query = $query;
	}

}