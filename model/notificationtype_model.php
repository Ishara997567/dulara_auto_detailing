<?php include_once '../commons/DbConnection.php';
$dbConnection = new DbConnection();
class NotificationType
{
    public function getAllNotificationTypesById($nt_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM notification_type WHERE nt_id = '$nt_id';";
        return $con->query($sql);
    }
}
