<?php include "../commons/DbConnection.php";
$dbConnection = new DbConnection();

class Report{
    public function getEvenReportModules(){
        $con = $GLOBALS['conn'];
        $sql = "SELECT * FROM report_module WHERE rm_id % 2 = 0;";
        return $con->query($sql);
    }

    public function getOddReportModules(){
        $con = $GLOBALS['conn'];
        $sql = "SELECT * FROM report_module WHERE rm_id % 2 = 1;";
        return $con->query($sql);
    }
}