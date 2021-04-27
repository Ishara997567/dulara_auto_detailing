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
}