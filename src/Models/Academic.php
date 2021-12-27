<?php

namespace Sap\ComputerScienceFacultyMvcTask\Models;

use Sap\ComputerScienceFacultyMvcTask\Models\Database;

class Academic {
    
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new Database();
    }

    function addAcademic($name, $rank) {
        $query = "INSERT INTO academic (name,rank) VALUES (?, ?)";
        $paramType = "ss";
        $paramValue = array(
            $name,
            $rank,
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
    function editAcademic($name, $rank, $academic_id) {
        $query = "UPDATE academic SET name = ?,rank = ? WHERE id = ?";
        $paramType = "sss";
        $paramValue = array(
            $name,
            $rank,
            $academic_id
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function deleteAcademic($academic_id) {
        $query = "DELETE FROM academic WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $academic_id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function getAcademicById($academic_id) {
        $query = "SELECT * FROM academic WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $academic_id
        );
        
        $resultAcademic = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $resultAcademic;
    }

    function getAllAcademics() {
        $sql = "SELECT * FROM academic ORDER BY id";

        $resultAcademic = $this->db_handle->runBaseQuery($sql);
        return $resultAcademic;
    }
}