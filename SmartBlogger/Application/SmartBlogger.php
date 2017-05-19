<?php
namespace SmartBlogger\Application;

use SmartBlogger\Application\Commands\PresentCommand;
use SmartBlogger\Controller\SmartControllerFactory;
use SmartBlogger\Exception\ControllerNotFoundException;
use SmartBlogger\Exception\PresenterNotFoundException;

class SmartBlogger
{
	private static $_data = [];

	public static function test()
	{
		return "testing hello from Smart";
	}

	public static function handleAction($action)
	{
		list($controller, $action) = explode("@", $action);
		$foundController = SmartControllerFactory::make($controller);
		if(!$foundController)
			throw new ControllerNotFoundException($controller);

		self::$_data['action'] = $action;
		self::$_data['controller'] = $controller;
		self::$_data['data'] = $foundController->{$action}();
	}

	public static function respond(){

		$presenter = PluginRegistry::get(PluginRegistry::PRESENTER);

		if(!$presenter)
			throw new PresenterNotFoundException();

		echo $presenter->handle(new PresentCommand(self::$_data));
	}
}