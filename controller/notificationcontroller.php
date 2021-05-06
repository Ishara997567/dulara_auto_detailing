<?php
include '../model/notification_model.php';

$notificationObj = new Notification();

if(isset($_REQUEST["status"])) {
    $status = $_REQUEST['status'];

    switch($status){
        case 'change_is_read':
            if(isset($_POST['notID'])){
                $not_id = $_POST['notID'];
                $notificationObj->changeIsRead($not_id);
            }
            break;

        case "mark_read":
            $notificationObj->markAllAsRead();
            break;

        case "mark_unread":
            $notificationObj->markAllAsUnread();
            break;
    }
}


