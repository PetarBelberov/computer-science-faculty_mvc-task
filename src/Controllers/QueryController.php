<?php 
namespace Sap\ComputerScienceFacultyMvcTask\Controllers;

ob_start();
class QueryController extends HomeController
{
    function __construct() {
        parent::__construct();
    }

    public function index() {
       
        require_once "../views/header.php";
        require_once "../views/queries/list_show.php";
        require_once "../views/footer.php";
    }

    public function studentsAcademics() {
        $studentsCourses = $this->query->getStudentsCourses();
        $academicsCourses = $this->query->getAcademicsCourses();

        require_once "../views/header.php";
        require_once "../views/queries/students_academics.php";
        require_once "../views/footer.php";
    }

    public function studentsCredits() {
        $studentsCredits = $this->query->getStudentsCredits();

        require_once "../views/header.php";
        require_once "../views/queries/students_credits.php";
        require_once "../views/footer.php";
    }

    public function academicsCoursesStudents() {
        $academicsCoursesStudents = $this->query->getAcademicsCoursesAndStudentsSum();

        require_once "../views/header.php";
        require_once "../views/queries/academics_courses_students.php";
        require_once "../views/footer.php";
    }

    public function firstThreeStudentsCourses() {
        $firstThreeStudentsCourses = $this->query->getFirstThreeStudentsCourses();

        require_once "../views/header.php";
        require_once "../views/queries/first_three_students_courses.php";
        require_once "../views/footer.php";
    }

    public function firstThreeAcademicsStudents() {
        $firstThreeAcademicsStudents = $this->query->getFirstThreeAcademicsStudents();

        require_once "../views/header.php";
        require_once "../views/queries/first_three_academics_students.php";
        require_once "../views/footer.php";
    }
}