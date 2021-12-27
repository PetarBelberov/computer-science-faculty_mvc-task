<?php 
namespace Sap\ComputerScienceFacultyMvcTask\Controllers;

use Sap\ComputerScienceFacultyMvcTask\Models\Academic;

ob_start();
class AcademicController extends HomeController
{
    function __construct() {
        parent::__construct();
    }

    public function index() {
        if (! empty($_GET["action"])) {
            $action = $_GET["action"];
        }
        $academic = new Academic();
        $results = $academic->getAllAcademics();

        $options = array();
        array_push( $options, 'Assistant Professor');
        array_push( $options, 'Senior Assistant Professor');
        array_push( $options, 'Docent');
        array_push( $options, 'Professor');

        require_once "../views/header.php";
        require_once "../views/academics_show.php";
        require_once "../views/footer.php";

        if (isset($action)) {
            switch ($action) {
                case "academic-add":
                if (isset($_POST['addAcademic'])) {
                    $this->addAcademic();
                }
                require_once "../views/academic_add.php";
                break;

            case "academic-edit":
                $academic_id = $_GET["id"];
                
                if (isset($_POST['addAcademic'])) {
                    $this->editAcademic();
                }
                
                $result = $this->academic->getAcademicById($academic_id);
                require_once "../views/academic_edit.php";
                break;
            
            case "academic-delete":
                $academic_id = $_GET["id"];                    
                $this->academic->deleteAcademic($academic_id);

                header("Location: index.php");
                $result = $this->academic->getAllAcademics();
                require_once "../views/index.php";
                break;
            
            default:
                break;
            }
        }
    }

    public function addAcademic() {
        $name = trim(htmlspecialchars($_POST['nameAcademic'], ENT_QUOTES));
        $rank = trim(htmlspecialchars($_POST['rankAcademic'], ENT_QUOTES));
        
        // Validation
        if (!empty($name && $rank)) {
            $insertId = $this->academic->addAcademic($name, $rank);
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

    public function editAcademic() {
        $academic_id = trim(htmlspecialchars($_GET["id"], ENT_QUOTES));
        $name = trim(htmlspecialchars($_POST['nameAcademic'], ENT_QUOTES));
        $rank = trim(htmlspecialchars($_POST['rankAcademic'], ENT_QUOTES));
        
        // Validation
        if (!empty($name && $rank)) {
            $this->academic->editAcademic($name, $rank, $academic_id);
        }

        header("Location: index.php");
    }

    public function getAllAcademics() {
        $result = new Academic();
        $result->getAllAcademics();
        
        require_once "../views/header.php";
        require_once "../views/index.php";
        require_once "../views/footer.php";
    }
}
?>