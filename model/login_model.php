<?php include_once '../commons/DbConnection.php';

    $dbConnection = new DbConnection();

class Login{
    public function validateUser($username, $password){
        $con = $GLOBALS['conn'];
        $q = "SELECT * FROM login WHERE username = '$username' AND password = '$password';";
        return $con->query($q);
    }

    public function getAllUserAccessLevels(){
        $con = $GLOBALS['conn'];
        $sql = "SELECT * FROM user_access_level;";
        return $con->query($sql);

    }

    public function insertUser($fn, $ln, $email, $gender, $dob, $nic, $cn1, $cn2, $user_access_level, $user_img){

        $con = $GLOBALS['conn'];
        $sql = "INSERT INTO user (user_first_name, user_last_name, user_email,user_gender, user_dob, user_nic, user_cn1, user_cn2, user_access_level, user_image) VALUES ('$fn', '$ln', '$email', '$gender', '$dob', '$nic', '$cn1', '$cn2', '$user_access_level', '$user_img');";

        $result= $con->query($sql);
        return $con->affected_rows;




    }
}