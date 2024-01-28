<?php 

class Router
{
    public $routes;

    public function __construct()
    {
        $slash = DIRECTORY_SEPARATOR;
        $this->routes = [
            $slash .'projects' . $slash . 'CatNanny' . $slash       => ['MainCtrl', 'render'],
            $slash .'projects' . $slash . 'CatNanny' . $slash . 'login'     => ['UserCtrl', 'login'],
            $slash .'projects' . $slash . 'CatNanny' . $slash . 'register'  => ['UserCtrl', 'register'],
            $slash .'projects' . $slash . 'CatNanny' . $slash . 'client'    => ['ClientCtrl', 'render'],
            $slash .'projects' . $slash . 'CatNanny' . $slash . 'change_info'   => ['ClientCtrl', 'change_info'],
            $slash .'projects' . $slash . 'CatNanny' . $slash . 'change_data'   => ['ClientCtrl', 'change_data'],
            $slash .'projects' . $slash . 'CatNanny' . $slash . 'change_cat'    => ['ClientCtrl', 'change_cat'],
            $slash .'projects' . $slash . 'CatNanny' . $slash . 'upload_photo'  => ['ClientCtrl', 'upload_photo'],
            $slash .'projects' . $slash . 'CatNanny' . $slash . 'add_new_cat'   => ['ClientCtrl', 'add_new_cat'],
        ];
    }
    
    public function redirect($url)
    {
        if (array_key_exists($url, $this->routes))
        {
            $controllerName = $this->routes[$url][0];
            $actionName = $this->routes[$url][1];
            $controllerObject = new $controllerName;
            $controllerObject -> $actionName();
        }
    }
}

?>