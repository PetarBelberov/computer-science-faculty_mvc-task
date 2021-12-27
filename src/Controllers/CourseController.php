<?php 
namespace Sap\ComputerScienceFacultyMvcTask\Controllers;

use Sap\ComputerScienceFacultyMvcTask\Models\Course;

ob_start();
class CourseController extends HomeController
{
    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        if (! empty($_GET["action"])) {
            $action = $_GET["action"];
        }
        $course = new Course();
        $result_courses = $course->getAllCourses();
        $result_academics = $course->getAllAcademics();

        require_once "../views/header.php";
        require_once "../views/courses_show.php";
        require_once "../views/footer.php";

        if (isset($action)) {
            switch ($action) {
                
                case "course-add":
                    if (isset($_POST['addCourse'])) {
                        $this->addCourse();
                    }
                    require_once "../views/course_add.php";
                    break;

                case "course-edit":
                    $course_id = $_GET["id"];
                    
                    if (isset($_POST['addCourse'])) {
                        $this->editCourse();
                    }
                    
                    $result = $this->course->getCourseById($course_id);
                    require_once "../views/course_edit.php";
                    break;
                
                case "course-delete":
                    $course_id = $_GET["id"];                    
                    $this->course->deleteCourse($course_id);

                    header("Location: index.php");
                    $result = $this->course->getAllCourses();
                    require_once "../views/index.php";
                    break;

                default:
                    break;
            }
        }
    }

    public function addCourse() {
        $name = trim(htmlspecialchars($_POST['nameCourse'], ENT_QUOTES));
        $credit = trim(htmlspecialchars($_POST['creditCourse'], ENT_QUOTES));
        
        // Validation
        if (!empty($name) && !empty($credit)) {
            $insertId = $this->course->addCourse($name, $credit);
        }
        if (empty($insertId)) {
            $response = array(
                "message" => "Problem in Adding New Record",
                "type" => "error"
            );
        } else {
            header("Location: index.php");
        }
    }
    
    public function editCourse() {
        $course_id = trim(htmlspecialchars($_GET["id"], ENT_QUOTES));
        $name = trim(htmlspecialchars($_POST['name'], ENT_QUOTES));
        $credit = trim(htmlspecialchars($_POST['credit'], ENT_QUOTES));

        // Validation
        if (!empty($name) && !empty($credit)) {
            $this->course->editCourse($name, $course_id);
        }
        
        header("Location: index.php");
    }

    public function getAllAcademics() {
        $course = new Course();
        $course->getAllAcademics();

        require_once "../views/header.php";
        require_once "../views/index.php";
        require_once "../views/footer.php";
    }

    public function getAllCourses() {
        $course = new Course();
        $course->getAllCourses();

        require_once "../views/header.php";
        require_once "../views/index.php";
        require_once "../views/footer.php";
    }
}
?>