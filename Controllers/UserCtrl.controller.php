<?php

class UserCtrl
{
    private function route()
    {
        $router = new Router;
        $slash = DIRECTORY_SEPARATOR;
        $_SERVER['REQUEST_URI'] = $slash .'projects' . $slash . 'CatNanny' . $slash . $_POST['uri'];
        $router->redirect($_SERVER['REQUEST_URI']);
    }

    private function start_session($user) {
        $cats = new Cat;
        $cats = $cats->get_cats($user[0]["id"]);

        $_POST['user'] = $user[0];
        $_POST['cats'] = $cats;

        $_POST['uri'] = "client";
        $_POST['error'] = "";
    }

    public function login()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        $user = new User;
        $user = $user->get_user($email);
        if($user === NULL) {
            $_POST['uri'] = "";
            $_POST['error'] = "wrong_email";
        } else {
            if ($user[0]["password"] === $password) {
                $this->start_session($user);
            }
            else {
                $_POST['uri'] = "";
                $_POST['error'] = "wrong_password";
            }
        }
        $this->route();
    }

    public function register()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        $user = new User;
        $user_exists = $user->get_user($email);

        if($user_exists === NULL) {
            $user->add_new_user($email, $password);
            $user = $user->get_user($email);
            $this->start_session($user);
        } else {
            $_POST['uri'] = "";
            $_POST['error'] = "user_exists";
        }
        $this->route();
    }
}

?>