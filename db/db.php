<?php
//ini_set('display_errors', 1);
class DB
{

    // public $server = "localhost";
    // public $username = "ahwikhsc_datab";
    // public $password = "@#Rafsan123";
    // // public $password = "";
    // public $dbname = "ahwikhsc_db";

    public $server = "localhost";
    public $username = "root";
    public $password = "rafsan123";
    // public $password = "";
    public $dbname = "ahwikhschool";
    public $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->server, $this->username, $this->password, $this->dbname);

        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        //  echo "Connected successfully";

    }

    public function query($sql)
    {
        $result = mysqli_query($this->conn, $sql);
        return $result;

    }

    public function insert($sql)
    {
        mysqli_query($this->conn, $sql);
    }

    public function update($sql)
    {
        mysqli_query($this->conn, $sql);
    }

}