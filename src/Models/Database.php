<?php
namespace Sap\ComputerScienceFacultyMvcTask\Models;

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
            return $resultSet;
        }
    }

    function runQuery($query, $param_type, $param_value_array) {
        $sql = $this->connect->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
        $result = $sql->get_result();
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $resultSet[] = $row;
            }
        }
        
        if(!empty($resultSet)) {
            return $resultSet;
        }
    }
    
    function bindQueryParams($sql, $param_type, $param_value_array) {
        $param_value_reference[] = & $param_type;
        for($i=0; $i<count($param_value_array); $i++) {
            $param_value_reference[] = & $param_value_array[$i];
        }
        call_user_func_array(array(
            $sql,
            'bind_param'
        ), $param_value_reference);
    }
    
    function insert($query, $param_type, $param_value_array) {
        $sql = $this->connect->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
        $insertId = $sql->insert_id;
        return $insertId;
    }
    
    function update($query, $param_type, $param_value_array) {
        $sql = $this->connect->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
    }
}