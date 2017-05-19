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

	public static function hydrate(){

		self::setServer($_SERVER['REQUEST_URI']);
		self::setQuery($_SERVER['QUERY_STRING']);
	}

	/**
	 * @return mixed
	 */
	public static function getServer()
	{
		return self::$_server;
	}

	/**
	 * @param mixed $server
	 */
	public static function setServer($server)
	{
		self::$_server = $server;
	}

	/**
	 * @return mixed
	 */
	public static function getQuery()
	{
		return self::$_query;
	}

	/**
	 * @param mixed $query
	 */
	public static function setQuery($query)
	{
		self::$_query = $query;
	}






}