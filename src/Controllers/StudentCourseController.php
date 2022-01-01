<?php

namespace Sap\ComputerScienceFacultyMvcTask\Controllers;

use Sap\ComputerScienceFacultyMvcTask\Models\StudentCourse;

ob_start();
class StudentCourseController extends HomeController {
    
    function __construct() {
        parent::__construct();

        if (! empty($_GET["id"])) {
            $this->studentId = $_GET["id"]; 
        }
    }

    public function index() {
        $this->getAllStudentCourses();
        if (isset($_POST['addStudentCourse'])) {
            $this->addStudentCourses();
        }
    }

    public function getAllStudentCourses() {
        
        $result = $this->student_course->getAllStudentsCourses();
        
        // Merge the multidimensional arrays result into one
        $allCourses = array_merge_recursive(...$this->course->getAllCourses())['name'];
        $studentName = array_merge_recursive(...$this->student->getStudentNameById($this->studentId))['name'];

        $studentCourses= array_merge_recursive(...$this->student_course->getCoursesNamesByStudentId($this->studentId))['name'];
        if (!is_array($studentCourses)) {
            $studentCourses= array_merge_recursive(...$this->student_course->getCoursesNamesByStudentId($this->studentId));
        }
        
        require_once "../views/header.php";
        require_once "../views/student_courses.php";
        require_once "../views/footer.php";
    }

    public function addStudentCourses() {
        if (isset($_POST['courseName'])) {
           
            $courseId = array_merge_recursive(...$this->student_course->getCourseIdByName($_POST['courseName']))['id'];
            var_dump($courseId);

            // Validation
            if (!empty($this->studentId) && !empty($courseId)) {  
                $insert = $this->student_course->addStudentCourse($this->studentId, $courseId);
            }

            if (empty($insert)) {
                $response = array(
                "message" => "Problem in Adding New Record",
                "type" => "error"
            );
            } else {
                header('Location: ' . BASE_URL . '/index.php/student-courses?id=' . $this->studentId);
            }
        }
    }
}