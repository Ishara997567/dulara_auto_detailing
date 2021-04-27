<?php
include '../model/user_model.php';

$userObj = new User();

if(isset($_REQUEST['status'])){
    $status = $_REQUEST['status'];

    switch ($status){
        case "check_current_password":
            if(isset($_POST['user_id'])){
                $user_id = $_POST['user_id'];
                $current_password = $_POST['current_password'];
                $password = strtoupper(sha1($current_password));

                $user_login_result = $userObj->getUserAndLoginByID($user_id);
                $row = $user_login_result->fetch_assoc();
                $p = $row['password'];


                if($password !== $p)
                    echo 0;
                else
                    echo 1;

            }


            break;

        case "change_password":
            if(isset($_POST['user_id']) && isset($_POST['new_password'])) {
                $user_id = $_POST['user_id'];
                $new_password = $_POST['new_password'];

                $password = strtoupper(sha1($new_password));

                echo $affected_rows = $userObj->changePasswordByID($user_id, $password);
            }
            break;
    }
}
