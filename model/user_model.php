<?php include_once '../commons/DbConnection.php';

$dbConnection = new DbConnection();

class User
{
    public function getAllUser()
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT * FROM user;";
        $con->query($sql);
    }

    public function getUserImageByID($id)
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT user_image FROM user WHERE user_id = '$id';";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        return $row['user_image'];

    }

    public function getUserAndLoginByID($id)
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT * FROM login l, user u WHERE u.user_id = l.user_id AND u.user_id = '$id';";
        return $con->query($sql);
    }

    public function changePasswordByID($id , $password)
    {
        $con = $GLOBALS['conn'];
        $sql = "UPDATE login SET password='$password' WHERE user_id = '$id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function getUserByID($id)
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT * FROM user WHERE user_id = '$id';";
        $result = $con->query($sql);
        return $result->fetch_assoc();
    }


    //Updating User Information

        //first name
    public function updateUserFirstName($id , $t)
    {
        $con = $GLOBALS['conn'];
        $sql = "UPDATE user SET user_first_name='$t' WHERE user_id = '$id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    //last name
    public function updateUserLastName($id , $t)
    {
        $con = $GLOBALS['conn'];
        $sql = "UPDATE user SET user_last_name='$t' WHERE user_id = '$id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    //email
    public function updateUserEmail($id , $t)
    {
        $con = $GLOBALS['conn'];
        $sql = "UPDATE user SET user_email='$t' WHERE user_id = '$id';";
        $con->query($sql);
        return $con->affected_rows;
    }
    //login username
    public function updateLoginEmail($id, $t){
        $con = $GLOBALS['conn'];
        $sql = "UPDATE login SET username ='$t' WHERE user_id = '$id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    //dob
    public function updateUserDOB($id , $t)
    {
        $con = $GLOBALS['conn'];
        $sql = "UPDATE user SET user_dob='$t' WHERE user_id = '$id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    //dob
    public function updateUserGender($id , $t)
    {
        $con = $GLOBALS['conn'];
        $sql = "UPDATE user SET user_gender='$t' WHERE user_id = '$id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    //dob
    public function updateUserNIC($id , $t)
    {
        $con = $GLOBALS['conn'];
        $sql = "UPDATE user SET user_nic='$t' WHERE user_id = '$id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    //dob
    public function updateUserCN1($id , $t)
    {
        $con = $GLOBALS['conn'];
        $sql = "UPDATE user SET user_cn1='$t' WHERE user_id = '$id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    //dob
    public function updateUserCN2($id , $t)
    {
        $con = $GLOBALS['conn'];
        $sql = "UPDATE user SET user_cn2='$t' WHERE user_id = '$id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function updateUserRole($id , $t)
    {
        $con = $GLOBALS['conn'];
        $sql = "UPDATE user SET user_access_level='$t' WHERE user_id = '$id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    //update profile photo
    public function updateUserImage($id , $img)
    {
        $con = $GLOBALS['conn'];
        $sql = "UPDATE user SET user_image='$img' WHERE user_id = '$id';";
        $con->query($sql);
    }

    public function removeUserImage($id)
    {
        $con = $GLOBALS['conn'];
        $sql = "UPDATE user SET user_image='default_user_img.png' WHERE user_id = '$id';";
        $con->query($sql);
    }

}