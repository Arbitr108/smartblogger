<?php
use SmartBlogger\Application\PluginRegistry;
use SmartBlogger\Application\Request;
use SmartBlogger\Storage\StorageFactory;

$config = require_once "../config/config.php";

$dotenv = new Dotenv\Dotenv("../", ".settings");

$dotenv->load();


Request::hydrate();


//register plugins
PluginRegistry::set(PluginRegistry::STORAGE, StorageFactory::make($config['storage']));
PluginRegistry::set(PluginRegistry::PRESENTER, StorageFactory::make($config['presenter']));

$db = PluginRegistry::get(PluginRegistry::STORAGE);
//var_dump($db);




