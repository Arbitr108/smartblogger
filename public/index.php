<?php

require __DIR__.'/../bootstrap/autoload.php';

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors ", 1);


echo "hello everybody<br>";

require_once __DIR__.'/../bootstrap/app.php';


echo $smartApp->test();