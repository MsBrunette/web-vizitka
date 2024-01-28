<?php

class Database
{
    private $connect;

    public function __construct()
    {
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "CatNanny";

        try {
            $this->connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function query($sql)
    {
        try {
            $result = $this->connect->query($sql, PDO::FETCH_ASSOC)->fetchAll();
            if ($result)
                return $result;
            //else echo "New record created successfully";
        }
        catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
    public function exe($sql) {
        $result = $this->connect->exec($sql);
        return $result;
    }
}


/*
$database = new Database;
$pass = 'passwd56';
$sql = "SELECT * FROM users where password = '$pass'";
var_dump($result = $database->query($sql));


$database = new Database;
$mail = "john@example.com";
$passwd = "passwdwdwd";

$sql = "INSERT INTO users (email, password)
VALUES ('$mail', '$passwd')";
var_dump($result = $database->query($sql));
*/



/*
print $_POST;
$database = new Database;
$sql = "INSERT INTO users ($_POST[0][0])
VALUES ($_POST[0][1])";
$database->query($sql);
*/
?>