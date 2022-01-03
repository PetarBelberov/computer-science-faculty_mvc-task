<?php 
namespace Sap\ComputerScienceFacultyMvcTask\Controllers;

use Sap\ComputerScienceFacultyMvcTask\Models\Academic;
use Sap\ComputerScienceFacultyMvcTask\Models\AcademicCourse;
use Sap\ComputerScienceFacultyMvcTask\Models\Course;
use Sap\ComputerScienceFacultyMvcTask\Models\Student;
use Sap\ComputerScienceFacultyMvcTask\Models\StudentCourse;

abstract class HomeController
{
    function __construct() {
        $this->student = new Student();
        $this->academic = new Academic();
        $this->course = new Course();
        $this->academic_course = new AcademicCourse();
        $this->student_course = new StudentCourse();
    }

    abstract function index();
}