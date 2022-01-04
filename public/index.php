<?php

use Sap\ComputerScienceFacultyMvcTask\Controllers\AcademicController;
use Sap\ComputerScienceFacultyMvcTask\Controllers\CourseController;
use Sap\ComputerScienceFacultyMvcTask\Controllers\QueryController;
use Sap\ComputerScienceFacultyMvcTask\Controllers\StudentController;
use Sap\ComputerScienceFacultyMvcTask\Controllers\StudentCourseController;

require dirname(__DIR__).'./vendor/autoload.php';

define('BASE_URL', baseURL());

function baseURL(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }
    return $protocol . "://" . $_SERVER['HTTP_HOST'];
}

if (isset($_GET["id"])) {
    if ($_SERVER['REQUEST_URI'] == '/index.php/student-courses?action=show&id=' . $_GET["id"]) {
        $student = new StudentCourseController();
        $student->index();
    }
}

$query = new QueryController();
if ($_SERVER['REQUEST_URI'] == '/index.php/queries/students-academics') {
    
    $query->index();
}
if ($_SERVER['REQUEST_URI'] == '/index.php/queries/students-credits') {
    
    $query->studentsCredits();
}
if ($_SERVER['REQUEST_URI'] == '/index.php/queries/academics-courses-students') {
    
    $query->academicsCoursesStudents();
}
if ($_SERVER['REQUEST_URI'] == '/index.php/queries/first-3-students-courses') {
    
    $query->firstThreeStudentsCourses();
}
if ($_SERVER['REQUEST_URI'] == '/index.php/queries/first-3-academics-students') {
    
    $query->firstThreeAcademicsStudents();
}


else {
    $student = new StudentController();
    $student->index();
    
    $academic = new AcademicController();
    $academic->index();
    
    $course = new CourseController();
    $course->index();
}



// $query = new QueryController();
// $query->index();


// if ($_SERVER['REQUEST_URI'] == '/index.php/students') {
//     $student = new StudentController();
//     $student->index();
// }
// if ($_SERVER['REQUEST_URI'] == '/index.php/academics') {
//     $academic = new AcademicController();
//     $academic->index();
// }
// if ($_SERVER['REQUEST_URI'] == '/index.php/courses') {
//     $course = new CourseController();
//     $course->index();
// }

   



   






