<?php

namespace Sap\ComputerScienceFacultyMvcTask\Controllers;

use Sap\ComputerScienceFacultyMvcTask\Models\StudentCourse;
use TypeError;

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

        if (isset($_POST['deleteStudentCourse'])) {
            $courseId = $_POST["courseId"];
            $this->deleteStudentCourses($this->studentId, $courseId);
        }
    }

    public function getAllStudentCourses() {
        
        $result = $this->student_course->getAllStudentsCourses();
        
        // Merge the multidimensional arrays result into one
        $allCourses = array_merge_recursive(...$this->course->getAllCourses())['name'];
        $studentName = array_merge_recursive(...$this->student->getStudentNameById($this->studentId))['name'];
        $studentId = $this->studentId;

        // Manage the array in which student is not enrolled in courses
        try {
            $studentCourses= array_merge_recursive(...$this->student_course->getCoursesNamesByStudentId($this->studentId));
            if (!is_array($studentCourses)) {
                $studentCourses= array_merge_recursive(...$this->student_course->getCoursesNamesByStudentId($this->studentId));
            }
        }catch(TypeError $e){
            $studentCourses =  "";
        }
        
        require_once "../views/header.php";
        require_once "../views/student_courses.php";
        require_once "../views/footer.php";
    }

    public function addStudentCourses() {
        if (isset($_POST['courseName'])) {
           
            $courseId = array_merge_recursive(...$this->student_course->getCourseIdByName($_POST['courseName']))['id'];
            
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
                header('Location: ' . BASE_URL . '/index.php/student-courses?action=show&id=' . $this->studentId);
            }
        }
    }

    public function deleteStudentCourses($studentId, $courseId) {
        
         // Validation
         if (!empty($studentId) && !empty($courseId)) {  
            $delete = $this->student_course->deleteStudentCourse($studentId, $courseId);
            var_dump( $delete);
        }
        header('Location: ' . BASE_URL . '/index.php/student-courses?action=show&id=' . $studentId);
    }
}