<?php

require_once "autoloader.php";

$router = new Router;
$router->redirect($_SERVER['REQUEST_URI']);

?>