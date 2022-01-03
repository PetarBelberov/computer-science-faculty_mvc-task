<?php

use Sap\ComputerScienceFacultyMvcTask\Controllers\AcademicController;
use Sap\ComputerScienceFacultyMvcTask\Controllers\CourseController;
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
// else {
    $student = new StudentController();
    $student->index();

    $academic = new AcademicController();
    $academic->index();

    $course = new CourseController();
    $course->index();
// }


   






