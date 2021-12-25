<?php
class Student {
    
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new Database();
    }

    function getAllStudents() {
        $sql = "SELECT * FROM tbl_student ORDER BY id";

        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}