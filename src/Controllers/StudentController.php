<?php 
namespace Sap\ComputerScienceFacultyMvcTask\Controllers;

use Sap\ComputerScienceFacultyMvcTask\Models\Student;

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
        require_once "../views/index.php";
        require_once "../views/footer.php";
    }

    function addStudent() {
        $name = $_POST['name'];
        $roll_number = $_POST['roll_number'];
        $dob = "";
        if ($_POST["dob"]) {
            $dob_timestamp = strtotime($_POST["dob"]);
            $dob = date("Y-m-d", $dob_timestamp);
        }
        $class = $_POST['class'];
        
        $insertId = $this->student->addStudent($name, $roll_number, $dob, $class);
        if (empty($insertId)) {
            $response = array(
                "message" => "Problem in Adding New Record",
                "type" => "error"
            );
        } else {
            header("Location: index.php");
        }
    }
    
    function editStudent() {
        $student_id = $_GET["id"];
        $name = $_POST['name'];
        $roll_number = $_POST['roll_number'];
        $dob = "";
        if ($_POST["dob"]) {
            $dob_timestamp = strtotime($_POST["dob"]);
            $dob = date("Y-m-d", $dob_timestamp);
        }
        $class = $_POST['class'];
        
       $this->student->editStudent($name, $roll_number, $dob, $class, $student_id);
        
        header("Location: index.php");
    }

    function getAllStudents() {
        $student = new Student();
        $student->getAllStudents();
        require_once "../views/header.php";
        require_once "../views/index.php";
        require_once "../views/footer.php";
    }
}
?>