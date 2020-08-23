<?php
include_once '../commons/DbConnection.php';
$dbConnObj = new DbConnection();

class Login{
    public function validateLogin($username, $password){
        $con = $GLOBALS['con'];

        $sql = "SELECT * FROM login WHERE login_username='$username' AND login_password='$password';";

        $result = $con->query($sql);
        return $result;
    }
}



?>