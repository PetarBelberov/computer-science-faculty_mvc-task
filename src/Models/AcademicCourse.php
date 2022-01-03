<?php

namespace Sap\ComputerScienceFacultyMvcTask\Models;

use Sap\ComputerScienceFacultyMvcTask\Models\Database;

class AcademicCourse {
    
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new Database();
    }

    function getAllCoursesAcademics() {
        $sql = "SELECT course.id, course.name as course_name, course.credit, academic.name FROM course
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

    function editCourseAcademic($academic_id, $currentAcademicId, $course_id ) {
        $query = "UPDATE academic_course 
            SET academic_course.academic_id= ?
            WHERE academic_course.academic_id = ? AND academic_course.course_id = ?";
        $paramType = "sss";
        $paramValue = array(
            $academic_id,
            $currentAcademicId ,
            $course_id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
}