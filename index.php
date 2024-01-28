<?php

//error_reporting(E_ALL);
//ini_set("display_errors", 1);

require_once "autoloader.php";

$router = new Router;
$router->redirect($_SERVER['REQUEST_URI']);

//require_once "router.php";

?>