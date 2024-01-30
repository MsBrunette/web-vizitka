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
            return $this->database->query("INSERT INTO users (email, password) VALUES ('$email', '$password')");
    }

    public function update_client_data($column, $data, $id)
    {
        $this->database->query("UPDATE $this->table SET $column = '$data' WHERE id = $id");
    }
}

?>