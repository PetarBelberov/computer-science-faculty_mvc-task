<?php

use Sap\ComputerScienceFacultyMvcTask\Controllers\StudentController;

require dirname(__DIR__).'./vendor/autoload.php';

define('BASE_URL', baseURL());

function baseURL(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }
    return $protocol . "://" . $_SERVER['HTTP_HOST'];
}

$student = new StudentController();
$student->index();