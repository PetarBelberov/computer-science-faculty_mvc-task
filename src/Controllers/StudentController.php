<?php 

class StudentController
{
    function __construct() {
        $this->student = new Student();
    }
    
    public function index() {
        if (! empty($_GET["action"])) {
            $action = $_GET["action"];
        }
        $student = new Student();
        $result = $student->getAllStudents();
        
        require_once "../views/header.php";
        require_once "../views/student.php";
    }

    function getAllStudents() {
        $student = new Student();
        $student->getAllStudents();
        require_once "../views/header.php";
        require_once "../views/student.php";
    }
}
?>