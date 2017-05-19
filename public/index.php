<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors ", 1);

require __DIR__.'/../bootstrap/autoload.php';
require __DIR__.'/../bootstrap/bootstrap.php';
require_once __DIR__.'/../bootstrap/app.php';


//$db = \Classes\Storage\MysqlStorage::getInstance();
//$db->setQuery("Select * from test_table");
//$result = $db->executeQuery();
//var_dump($result->fetchAll());