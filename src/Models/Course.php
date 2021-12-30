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
        $query = "UPDATE course SET name = ?, credit = ? WHERE id = ?";
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

    function getAllCoursesAcademics() {
        $sql = "SELECT * FROM course
            JOIN academic_course ON academic_course.course_id = course.id
            JOIN academic ON academic.id=academic_course.academic_id";

        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function addCourseAcademic($academic_id, $insertId) {
        $query = "INSERT INTO academic_course (academic_id, course_id) VALUES (?, ?)";
        $paramType = "ss";
        $paramValue = array(
            $academic_id,
            $insertId
        );
        
        $result = $this->db_handle->insert($query, $paramType, $paramValue);
        return $result;
    }

    function editCourseAcademic($academic_id, $current_academic_name, $course_id ) {
        $query = "UPDATE academic_course 
            JOIN academic ON academic.id = academic_course.academic_id
            SET academic_id= ?
            WHERE academic.name = ? AND academic_course.course_id = ?";
        $paramType = "sss";
        $paramValue = array(
            $academic_id,
            $current_academic_name ,
            $course_id
        );
        var_dump($academic_id);
        $this->db_handle->update($query, $paramType, $paramValue);
    }
}