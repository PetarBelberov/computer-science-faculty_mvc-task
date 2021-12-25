<?php

class Database {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "cs_faculty";

    function __construct() {
        $this->connect = $this->connectDB();
    }   
    
    function connectDB() {
        $connect = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        return $connect;
    }
    
    function runBaseQuery($query) {
        $result = $this->connect->query($query);   
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $resultSet[] = $row;
            }
        }
        return $resultSet;
    }
}