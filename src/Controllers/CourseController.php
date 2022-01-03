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
        $this->getAllCourses();
        
        if (isset($action)) {
            switch ($action) {
                
                case "course-add":
                    if (isset($_POST['addCourse'])) {
                        $this->addCourse();
                    }
                    
                    $result_academics = $this->academic->getAllAcademics();
                    require_once "../views/course_add.php";
                    break;

                case "course-edit":
                    $course_id = $_GET["id"];
                    
                    if (isset($_POST['addCourse'])) {
                        $this->editCourse();
                    }
                    
                    $result_academics = $this->academic->getAllAcademics();
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

    public function getAllCourses() {
        $course = new Course();
        $result_courses = $course->getAllCourses();
        $courseAcademics = $this->academic_course->getAllCoursesAcademics();

        require_once "../views/header.php";
        require_once "../views/courses_show.php";
        require_once "../views/footer.php";
    }

    public function addCourse() {
        $name = trim(htmlspecialchars($_POST['nameCourse'], ENT_QUOTES));
        $credit = trim(htmlspecialchars($_POST['creditCourse'], ENT_QUOTES));
        $academicName = trim(htmlspecialchars($_POST['academicCourse'], ENT_QUOTES));
        $academicCheck = "";

        $academics = $this->academic->checkAcademicName($academicName);
        
        $academics = $this->academic->getAcademicIdByName('');
        $academic_id = "";
        foreach ($academics as $academic) {
            if ($academic['name'] == $academicName) {
                $academic_id = $academic['id'];
            }
        }

        foreach ($academics as $academic ) {
            if (in_array($academicName, $academic)) {
                $academicCheck = $academic;
            }
        }

        // Validation
        if (!empty($name) && !empty($credit) && !empty($academicCheck)) {
            $insertId = $this->course->addCourse($name, $credit);
            $this->academic_course->addCourseAcademic($academic_id, $insertId);
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
        $courseId = trim(htmlspecialchars($_GET["id"], ENT_QUOTES));
        $courseId = (int) $courseId;
        $name = trim(htmlspecialchars($_POST['nameCourse'], ENT_QUOTES));
        $credit = trim(htmlspecialchars($_POST['creditCourse'], ENT_QUOTES));
        
        $currentAcademicId = array_merge_recursive(...$this->academic->getAcademicIdByCourseId($courseId))['academic_id'];
        $academic_name = trim(htmlspecialchars($_POST['academicCourse'], ENT_QUOTES));
        $academicId = array_merge_recursive(...$this->academic->getAcademicIdByName($academic_name))['id'];
        
        // Validation
        if (!empty($name) && !empty($credit)  && !empty($academic_name)) {
            $this->course->editCourse($name, $credit, $courseId);
            $insertCourseAcademic = $this->academic_course->editCourseAcademic($academicId, $currentAcademicId, $courseId);
        }

        header('Location: ' . BASE_URL);
    }
}
?>