<?php

namespace Sap\ComputerScienceFacultyMvcTask\Models;

use Sap\ComputerScienceFacultyMvcTask\Models\Database;

class Student {
    
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new Database();
    }

    function addStudent($name, $course) {
        $query = "INSERT INTO student (name,course) VALUES (?, ?)";
        $paramType = "ss";
        $paramValue = array(
            $name,
            $course,
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
    function editStudent($name, $course, $student_id) {
        $query = "UPDATE student SET name = ?,course = ? WHERE id = ?";
        $paramType = "sss";
        $paramValue = array(
            $name,
            $course,
            $student_id
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function deleteStudent($student_id) {
        $query = "DELETE FROM student WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $student_id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function getStudentById($student_id) {
        $query = "SELECT * FROM student WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $student_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function getAllStudents() {
        $sql = "SELECT * FROM student ORDER BY id";

        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}