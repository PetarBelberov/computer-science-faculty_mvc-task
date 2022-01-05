<?php 
namespace Sap\ComputerScienceFacultyMvcTask\Controllers;

use Sap\ComputerScienceFacultyMvcTask\Models\Student;

ob_start();
class StudentController extends HomeController
{
    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        if (! empty($_GET["action"])) {
            $action = $_GET["action"];
        }
        
        $this->getAllStudents();
        if (isset($action)) {
            switch ($action) {
                
                case "student-add":
                    if (isset($_POST['add'])) {
                        $this->addStudent();
                    }
                    require_once "../views/student_add.php";
                    break;

                case "student-edit":
                    $student_id = $_GET["id"];
                    
                    if (isset($_POST['add'])) {
                        $this->editStudent();
                    }
                    
                    $result = $this->student->getStudentById($student_id);
                    require_once "../views/student_edit.php";
                    break;
                
                case "student-delete":
                    $student_id = $_GET["id"];                    
                    $this->student->deleteStudent($student_id);

                    header("Location: index.php");
                    $result = $this->student->getAllStudents();
                    require_once "../views/index.php";
                    break;

                default:
                    break;
            }
        }
    }

    public function getAllStudents() {
        $student = new Student();
        $result = $student->getAllStudents();
        
        require_once "../views/header.php";
        require_once "../views/index.php";
        require_once "../views/footer.php";
    }

    public function addStudent() {
        $name = trim(htmlspecialchars($_POST['name'], ENT_QUOTES));

        // Validation
        if (!empty($name)) {
            $insertId = $this->student->addStudent($name);
        }
        header('Location: ' . BASE_URL . '/index.php');
    }
    
    public function editStudent() {
        $student_id = trim(htmlspecialchars($_GET["id"], ENT_QUOTES));
        $name = trim(htmlspecialchars($_POST['name'], ENT_QUOTES));

        // Validation
        if (!empty($name)) {
            $this->student->editStudent($name, $student_id);
        }
        
        header('Location: ' . BASE_URL . '/index.php');
    }
}
?>