<?php
namespace Sap\ComputerScienceFacultyMvcTask\Models;

use Sap\ComputerScienceFacultyMvcTask\Models\Database;

class Query
{
    private $db_handle;
    
    public function __construct()
    {
        $this->db_handle = new Database();
    }

    function getStudentsCourses() {
        $sql = "SELECT student.name as StudentName, course.name as CoursesName FROM student
            JOIN student_course ON student_course.student_id=student.id
            JOIN course ON course.id=student_course.course_id
            ORDER BY StudentName";

        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function getAcademicsCourses() {
        $sql = "SELECT academic.name as AcademicName, COUNT(course.name) as NumberOfCourses FROM academic
            JOIN academic_course ON academic_course.academic_id=academic.id
            JOIN course ON course.id=academic_course.course_id
            GROUP BY AcademicName
            ORDER BY AcademicName";

        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

}