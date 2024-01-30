<?php

class ClientCtrl
{
    private function route()
    {
        $router = new Router;
        $slash = DIRECTORY_SEPARATOR;
        $_SERVER['REQUEST_URI'] = $slash .'projects' . $slash . 'CatNanny' . $slash . $_POST['uri'];
        $router->redirect($_SERVER['REQUEST_URI']);
    }

    public function render()
    {
        $filepath = 'Views' . DIRECTORY_SEPARATOR . 'ClientPage.view.php';
        require_once($filepath);
    }

    public function change_info()
    {    
        $user_id = $_POST["client_id"];
        $datas = [
            'name' => $_POST["name"],
            'address' => $_POST["address"],
            'phone' => $_POST["phone"],
            'info' => $_POST["info"],
        ];
        
        $user = new User;
        foreach($datas as $key => $value)
        {
            $user->update_client_data($key, $value, $user_id);
        }

        $user = $user->get_user_by_id($user_id);

        $cats = new Cat;
        $cats = $cats->get_cats($user[0]["id"]);

        $_POST['user'] = $user[0];
        $_POST['cats'] = $cats;
        $_POST['uri'] = "client";
        $_POST['error'] = "";
        $this->route();
    }

    public function change_data()
    {
        $user_id = $_POST["client_id"];

        $user = new User;
        if ($_POST["email"] === NULL) {
            $user->update_client_data('password', $_POST["password"], $user_id);
        } else {
            $user->update_client_data('email', $_POST["email"], $user_id);
        }

        $user = $user->get_user_by_id($user_id);

        $cats = new Cat;
        $cats = $cats->get_cats($user[0]["id"]);

        $_POST['user'] = $user[0];
        $_POST['cats'] = $cats;
        $_POST['uri'] = "client";
        $_POST['error'] = "";
        $this->route();
    }

    public function change_cat()
    {
        $cat_id = $_POST["cat_id"];
        $datas = [
            'cat_name' => $_POST["cat_name"],
            'cat_age' => $_POST["cat_age"],
            'cat_character' => $_POST["cat_character"],
            'cat_problems' => $_POST["cat_problems"],
            'cat_info' => $_POST["cat_info"],
        ];

        $cat = new Cat;
        foreach($datas as $key => $value)
        {
            $cat->update_cat_data($key, $value, $cat_id);
        }

        $cat = $cat->get_cat_by_id($cat_id);

        $user = new User;
        $user = $user->get_user_by_id($cat[0]["user_id"]);
        $cats = new Cat;
        $cats = $cats->get_cats($user[0]["id"]);

        $_POST['user'] = $user[0];
        $_POST['cats'] = $cats;
        $_POST['uri'] = "client";
        $_POST['error'] = $cat_id;
        $this->route();
    }

    public function upload_photo()
    {
        $uploaddir = '././Views/images/temp/';
        $uploadfile = $uploaddir . "temp.png";
        move_uploaded_file($_FILES['fileName']['tmp_name'], $uploadfile);
        
        $user_id = $_POST["user_id"];

        $_POST['adding_cat'] = "active";

        $user = new User;
        $user = $user->get_user_by_id($user_id);
        $cats = new Cat;
        $cats = $cats->get_cats($user[0]["id"]);

        $_POST['user'] = $user[0];
        $_POST['cats'] = $cats;
        $_POST['uri'] = "client";
        $_POST['error'] = $_POST['current_cat'];
        
        $this->route();
    }

    public function add_new_cat()
    {
        $user_id = $_POST["user_id"];

        $cat = new Cat;
        $cat = $cat->add_new_cat($_POST["user_id"], $_POST["new_cat_name"], $_POST["new_cat_age"], 
                                    $_POST["new_cat_character"], $_POST["new_cat_problems"], $_POST["new_cat_info"]);

        copy("././Views/images/temp/temp.png", "././Views/images/cats/". $cat[0]['cat_id'] . ".png");

        $user = new User;
        $user = $user->get_user_by_id($user_id);
        $cats = new Cat;
        $cats = $cats->get_cats($user[0]["id"]);

        $_POST['adding_cat'] = "clear";
        $_POST['user'] = $user[0];
        $_POST['cats'] = $cats;
        $_POST['uri'] = "client";
        $_POST['error'] = $cat[0]['cat_id'];
        
        $this->route();
    }
}

?>