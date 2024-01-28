<?php

/* echo '<br>-----main-----<pre>';
var_dump($_POST);
echo '</pre><br><br>'; */
/*die(); */

require_once "autoloader.php";

$router = new Router;
$slash = DIRECTORY_SEPARATOR;
$_SERVER['REQUEST_URI'] = $slash .'projects' . $slash . 'CatNanny' . $slash . $_POST['uri'];
$router->redirect($_SERVER['REQUEST_URI']);

?>