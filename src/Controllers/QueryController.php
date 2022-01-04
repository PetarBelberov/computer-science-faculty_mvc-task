<?php 
namespace Sap\ComputerScienceFacultyMvcTask\Controllers;

ob_start();
class QueryController extends HomeController
{
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $studentsCourses = $this->query->getStudentsCourses();
        $academicsCourses = $this->query->getAcademicsCourses();

        require_once "../views/header.php";
        require_once "../views/queries/students_academics.php";
        require_once "../views/footer.php";
    }
}