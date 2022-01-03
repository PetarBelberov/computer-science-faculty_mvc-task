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

    function getCoursesNamesByStudentId($student_id) {
        $query = "SELECT course.id, name FROM course
            JOIN student_course ON course.id = student_course.course_id
            WHERE student_course.student_id = ?";
        $paramType = "s";
        $paramValue = array(
            $student_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function getCoursesIdByStudentId($student_id) {
        $query = "SELECT course.id FROM course
            JOIN student_course ON course.id = student_course.course_id
            WHERE student_course.student_id = ?";
        $paramType = "s";
        $paramValue = array(
            $student_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function getCourseIdByName($courseName) {
        $query = "SELECT id FROM course
            WHERE name = ?";
        $paramType = "s";
        $paramValue = array(
            $courseName
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function addStudentCourse($studentId, $courseId) {
        $query = "INSERT INTO student_course (student_id, course_id) VALUES (?, ?)";
        $paramType = "ss";
        $paramValue = array(
            $studentId,
            $courseId
        );
        
        $result = $this->db_handle->insert($query, $paramType, $paramValue);
        return $result;
    }

    function deleteStudentCourse($studentId, $courseId) {
        $query = "DELETE FROM student_course WHERE student_id = ? AND course_id = ?";
        $paramType = "ii";
        $paramValue = array(
            $studentId,
            $courseId
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
}