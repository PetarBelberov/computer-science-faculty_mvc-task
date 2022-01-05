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

    // The general query - index
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

    // Student name and sum of his/her courses - studentsCredits
    function getStudentsCredits() {
        $sql = "SELECT student.name as StudentName, SUM(course.credit) as CourseCredit FROM student
            JOIN student_course ON student_course.student_id=student.id
            JOIN course ON course.id=student_course.course_id
            GROUP BY StudentName
            ORDER BY StudentName";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    // Academic name, Course name and the number of Students - academicsCoursesStudents
    function getAcademicsCoursesAndStudentsSum() {
        $sql = "SELECT academic.name as AcademicName, course.name as CourseName, COUNT(student.id) as NumberOfStudents FROM academic
            JOIN academic_course ON academic_course.academic_id=academic.id
            JOIN course ON course.id=academic_course.course_id
            LEFT JOIN student_course ON student_course.course_id=course.id
            LEFT JOIN student ON student.id=student_course.student_id
            GROUP BY CourseName
            ORDER BY AcademicName";

        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    // The first 3 course names with the most number of Students - firstThreeStudentsCourses
    function getFirstThreeStudentsCourses() {
        $sql = "SELECT course.name as CourseName, COUNT(student.id) as NumberOfStudents FROM course
            LEFT JOIN student_course ON student_course.course_id=course.id
            LEFT JOIN student ON student.id=student_course.student_id
            GROUP BY CourseName
            ORDER BY NumberOfStudents DESC
            LIMIT 3";

        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    // The first 3 academic names with the most number of Students assigned into their Course - firstThreeAcademicsStudents
    function getFirstThreeAcademicsStudents() {
        $sql = "SELECT academic.name as AcademicName, COUNT(student.id) as NumberOfStudents FROM academic
            JOIN academic_course ON academic_course.academic_id=academic.id
            JOIN course ON course.id=academic_course.course_id
            LEFT JOIN student_course ON student_course.course_id=course.id
            LEFT JOIN student ON student.id=student_course.student_id
            GROUP BY AcademicName
            ORDER BY NumberOfStudents DESC
            LIMIT 3";

        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

}