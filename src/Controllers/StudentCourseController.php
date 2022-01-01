<?php

namespace Sap\ComputerScienceFacultyMvcTask\Controllers;

use Sap\ComputerScienceFacultyMvcTask\Models\StudentCourse;

ob_start();
class StudentCourseController extends HomeController {
    
    private $db_handle;
    
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->getAllStudentCourses();
    }

    public function getAllStudentCourses() {
        if (! empty($_GET["id"])) {
            $studentId = $_GET["id"];
        }
        
        $studentCourse = new StudentCourse();
        $result = $studentCourse->getAllStudentsCourses();
        
        // Merge the multidimensional arrays result into one
        $allCourses = array_merge_recursive(...$this->course->getAllCourses())['name'];
        $studentName = array_merge_recursive(...$this->student->getStudentNameById($studentId))['name'];

        $studentCourses= array_merge_recursive(...$this->student_course->getCoursesByStudentId($studentId))['name'];
        if (!is_array($studentCourses)) {
            $studentCourses= array_merge_recursive(...$this->student_course->getCoursesByStudentId($studentId));
        }
        
        require_once "../views/header.php";
        require_once "../views/student_courses.php";
        require_once "../views/footer.php";
    }

    public function addStudentCourses() {
        $studentCourse = new StudentCourse();
        $result = $studentCourse->getAllStudentsCourses();
        if ( $_GET["id"] == $result[0]['id']) {
            $courseNames = $_POST['courseName'];
            foreach ($courseNames as $courseName) {
                // var_dump($courseName);
                $this->student->addStudentCourse($courseName);
            }
        }
    }
}