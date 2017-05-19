<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 19.05.2017
 * Time: 9:35
 */

namespace SmartBlogger\Application;


class PluginRegistry
{
	const STORAGE = 'storage';
	const PRESENTER = 'presenter';

	private static $_storedPlugins = [];

	private static $allowedKeys = [
		self::STORAGE,
		self::PRESENTER
	];


	public static function set($key, $value)
	{
		if (!in_array($key, self::$allowedKeys)) {
			throw new \InvalidArgumentException('Invalid key given');
		}

		self::$_storedPlugins[$key] = $value;
	}


	public static function get($key)
	{
		if (!in_array($key, self::$allowedKeys) || !isset(self::$_storedPlugins[$key])) {
			throw new \InvalidArgumentException('Invalid key given');
		}

		return self::$_storedPlugins[$key];
	}
}