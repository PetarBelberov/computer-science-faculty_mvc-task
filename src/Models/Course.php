<?php

namespace Sap\ComputerScienceFacultyMvcTask\Models;

use Sap\ComputerScienceFacultyMvcTask\Models\Database;

class Course {
    
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new Database();
    }

    function addCourse($name, $credit) {
        $query = "INSERT INTO course (name, credit) VALUES (?, ?)";
        $paramType = "ss";
        $paramValue = array(
            $name,
            $credit
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
    function editCourse($name, $credit, $course_id) {
        $query = "UPDATE student SET name = ?, credit = ? WHERE id = ?";
        $paramType = "sss";
        $paramValue = array(
            $name,
            $credit,
            $course_id
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function deleteCourse($course_id) {
        $query = "DELETE FROM course WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $course_id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function getCourseById($course_id) {
        $query = "SELECT * FROM course WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $course_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function getAllCourses() {
        $sql = "SELECT * FROM course ORDER BY id";

        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}