<?php
use SmartBlogger\Application\PluginRegistry;
use SmartBlogger\Application\Request;
use SmartBlogger\Application\Router;
use SmartBlogger\Application\SmartBlogger;
use SmartBlogger\Presenter\PresenterFactory;
use SmartBlogger\Storage\StorageFactory;

$config = require_once "../config/config.php";

$dotenv = new Dotenv\Dotenv("../", ".settings");

$dotenv->load();

PluginRegistry::set(PluginRegistry::STORAGE, StorageFactory::make($config['storage']));
PluginRegistry::set(PluginRegistry::PRESENTER, PresenterFactory::make($config['presenter']));

$db = PluginRegistry::get(PluginRegistry::STORAGE);

require_once "app.php";

$routes = require_once "../config/routes.php";

Router::registerRoutes($routes);

$action = Router::handle(Request::hydrate());

SmartBlogger::handleAction($action);

SmartBlogger::respond();
