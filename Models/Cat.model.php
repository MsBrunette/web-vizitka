<?php

class Cat
{
    private $database;
    private $table = 'cats';

    public function __construct()
    {
        $this->database = new Database;
    }

    public function get_cats($user_id)
    {
        return $this->database->query("SELECT * FROM $this->table where user_id = $user_id");
    }

    public function get_cat_by_id($cat_id)
    {
        return $this->database->query("SELECT * FROM $this->table where cat_id = $cat_id");
    }

    public function add_new_cat($user_id, $cat_name, $cat_age, $cat_character, $cat_problems, $cat_info)
    {
        $this->database->query("INSERT INTO $this->table (user_id, cat_name, cat_age, cat_character, cat_problems, cat_info)
                                            VALUES ($user_id, '$cat_name', '$cat_age', '$cat_character', '$cat_problems', '$cat_info')");
        return $this->database->query("SELECT * FROM $this->table where user_id = $user_id AND cat_name = '$cat_name' AND cat_age = '$cat_age'");
    }

    public function update_cat_data($column, $data, $id)
    {
        $this->database->query("UPDATE $this->table SET $column = '$data' WHERE cat_id = $id");
    }
}

/*
$u = new User;
echo $a=$u->add_new_user("pet.owner@mail.com", "pass");

$u = new User;
$user = $u->get_user("pet.owner@mail.com");
var_dump($user[0]["password"]);
if ("passwd56" === $user[0]["password"]) echo "Victory";



$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";
*/

?>