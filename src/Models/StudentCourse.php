<?php

namespace Sap\ComputerScienceFacultyMvcTask\Models;

use Sap\ComputerScienceFacultyMvcTask\Models\Database;

class StudentCourse {
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new Database();
    }

    function getAllStudentsCourses() {
        $sql = "SELECT * FROM course
            JOIN student_course ON student_course.course_id = course.id
            JOIN student ON student.id=student_course.student_id";
            
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

    // TODO
    function getCoursesByStudentId($student_id) {
        $query = "SELECT name FROM course
            JOIN student_course ON course.id = student_course.course_id
            WHERE student_course.student_id = ?";
        $paramType = "s";
        $paramValue = array(
            $student_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;

    }
}