<?php

class User
{
    protected $database;
    protected $table = 'users';

    public function __construct()
    {
        $this->database = new Database;
    }

    public function get_user($email)
    {
        return $this->database->query("SELECT * FROM $this->table where email = '$email' ");
    }

    public function get_user_by_id($id)
    {
        return $this->database->query("SELECT * FROM $this->table where id = $id ");
    }

    public function add_new_user($email, $password)
    {
        //if($this->get_user($email) === NULL)
            return $this->database->query("INSERT INTO users (email, password) VALUES ('$email', '$password')");
        //else return "This user already exists!";
    }

    public function update_client_data($column, $data, $id)
    {
        //$id = $_SESSION["client_id"];
        $this->database->query("UPDATE $this->table SET $column = '$data' WHERE id = $id");
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