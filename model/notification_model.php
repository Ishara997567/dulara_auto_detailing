<?php include_once '../commons/DbConnection.php';

$dbConnection = new DbConnection();

class Notification
{
    public function addNotification($nt_id, $not_message)
    {
        $con = $GLOBALS['conn'];
        $sql = "INSERT INTO notification (not_nt_id, not_message) VALUES ('$nt_id', '$not_message');";
        $con->query($sql);
        return $con->insert_id;
    }

    public function getLimitedNotifications()
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT * FROM notification n, notification_type nt WHERE n.not_nt_id = nt.nt_id ORDER BY n.not_id DESC LIMIT 5;";
        return $con->query($sql);
    }

    public function getAllNotifications()
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT * FROM notification n, notification_type nt WHERE n.not_nt_id = nt.nt_id ORDER BY n.not_id DESC;";
        return $con->query($sql);
    }
}
