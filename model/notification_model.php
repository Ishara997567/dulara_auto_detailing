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

    public function changeIsRead($not_id)
    {
        $con = $GLOBALS['conn'];
        $sql = "UPDATE notification SET not_is_read = 1 WHERE not_id = '$not_id';";
        $con->query($sql);
    }

    public function getUnreadNotificationCount()
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT COUNT(not_id) as c FROM notification WHERE not_is_read = 0;";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        return $row['c'];
    }

    public function markAllAsRead()
    {
        $con = $GLOBALS['conn'];
        $sql = "UPDATE notification SET not_is_read = 1;";
        $con->query($sql);
    }

    public function markAllAsUnread()
    {
        $con = $GLOBALS['conn'];
        $sql = "UPDATE notification SET not_is_read = 0;";
        $con->query($sql);
    }
}
