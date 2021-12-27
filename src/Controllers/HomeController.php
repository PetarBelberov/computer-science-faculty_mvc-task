<?php 
namespace Sap\ComputerScienceFacultyMvcTask\Controllers;

use Sap\ComputerScienceFacultyMvcTask\Models\Academic;
use Sap\ComputerScienceFacultyMvcTask\Models\Course;
use Sap\ComputerScienceFacultyMvcTask\Models\Student;

  abstract class HomeController
{
    function __construct() {
        $this->student = new Student();
        $this->academic = new Academic();
        $this->course = new Course();
    }

    abstract function index();

}